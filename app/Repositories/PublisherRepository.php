<?php

namespace App\Repositories;

use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use App\Repositories\Interfaces\PublisherRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PublisherRepository implements PublisherRepositoryInterface
{
    public function getPublisher($id)
    {
        return new PublisherResource(Publisher::with('books')->findOrFail($id));
    }

    public function getPublishers(Request $request)
    {
        $fieldsModel = [
            'id',
            'title',
            'description',
            'site',
            'created_at',
            'updated_at'
        ];
        $query = Publisher::query();

        if(isset($request['search']))
        {
            if(str_contains($request['search'], ':'))
            {
                $needleField = strstr($request['search'], ':', true);
                $needleValue = substr(strstr($request['search'], ':'), 1);

                if($needleField == 'books')
                {
                    $query->whereHas('books', function (Builder $builder) use ($needleValue) {
                        $builder->where('id','like', '%' . $needleValue . '%');
                        $builder->orWhere('title','like', '%' . $needleValue . '%');
                        $builder->orWhere('description','like', '%' . $needleValue . '%');
                        $builder->orWhere('genre','like', '%' . $needleValue . '%');
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

        return PublisherResource::collection($query->with('books')->get());
    }
}
