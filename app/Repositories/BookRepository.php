<?php

namespace App\Repositories;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookRepository implements BookRepositoryInterface
{
    public function getBook($id)
    {
        return new BookResource(Book::with('publishers')->findOrFail($id));
    }

    public function getBooks(Request $request)
    {
        $fieldsModel = [
            'id',
            'title',
            'description',
            'author_id',
            'genre',
            'created_at',
            'updated_at'
        ];
        $query = Book::query();

        if(isset($request['search']))
        {
            if(str_contains($request['search'], ':'))
            {
                $needleField = strstr($request['search'], ':', true);
                $needleValue = substr(strstr($request['search'], ':'), 1);

                if($needleField == 'publishers')
                {
                    $query->whereHas('publishers', function (Builder $builder) use ($needleValue) {
                        $builder->where('id','like', '%' . $needleValue . '%');
                        $builder->orWhere('title','like', '%' . $needleValue . '%');
                        $builder->orWhere('description','like', '%' . $needleValue . '%');
                        $builder->orWhere('site','like', '%' . $needleValue . '%');
                    });
                }

                if(in_array($needleField, $fieldsModel))
                    $query->where($needleField, 'like', '%' . $needleValue . '%');
            }
            else
            {
                foreach ($fieldsModel as $field)
                {
                    $query->orWhere($field, 'like', '%' . $request['search'] . '%');
                }
            }
        }

        $orderBy = 'asc';
        if(isset($request['sort_order']))
        {
            switch (strtoupper($request['sort_order']))
            {
                case 'ASC':
                case 'DESC':
                    $orderBy = $request['sort_order'];
                    break;
            }
        }

        if(isset($request['sort_by']))
        {
            if(in_array($request['sort_by'], $fieldsModel))
            {
                $query->orderBy($request['sort_by'], $orderBy);
            }
        }

        return BookResource::collection($query->with('publishers')->get());
    }
}
