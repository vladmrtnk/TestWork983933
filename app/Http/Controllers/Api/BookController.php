<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository){
        $this->bookRepository = $bookRepository;
    }

    public function index(Request $request)
    {
        return $this->bookRepository->getBooks($request);
    }

    public function show($id)
    {
        return $this->bookRepository->getBook($id);
    }
}
