<?php

namespace App\Repositories;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function getAuthor($id)
    {
        return new AuthorResource(Author::with('books')->findOrFail($id));
    }

    public function getAuthors(Request $request)
    {
        $fieldsModel = [
            'id',
            'name',
            'biography',
            'email',
            'created_at',
            'updated_at'
        ];
        $query = Author::query();

        if(isset($request['search']))
        {
            if(str_contains($request['search'], ':'))
            {
                $needleField = strstr($request['search'], ':', true);
                $needleValue = substr(strstr($request['search'], ':'), 1);
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

        return AuthorResource::collection($query->with('books')->get());
    }
}
