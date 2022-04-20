<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository){
        $this->authorRepository = $authorRepository;
    }

    public function index(Request $request)
    {
        return $this->authorRepository->getAuthors($request);
    }

    public function show($id)
    {
        return $this->authorRepository->getAuthor($id);
    }
}
