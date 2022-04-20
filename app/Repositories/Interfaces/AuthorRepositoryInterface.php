<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface AuthorRepositoryInterface
{
    public function getAuthor($id);

    public function getAuthors(Request $request);
}
