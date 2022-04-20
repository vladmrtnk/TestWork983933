<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface BookRepositoryInterface
{
    public function getBook($id);

    public function getBooks(Request $request);
}
