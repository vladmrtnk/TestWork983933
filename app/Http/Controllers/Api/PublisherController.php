<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PublisherRepositoryInterface;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private $publisherRepository;

    public function __construct(PublisherRepositoryInterface $publisherRepository){
        $this->publisherRepository = $publisherRepository;
    }

    public function index(Request $request)
    {
        return $this->publisherRepository->getPublishers($request);
    }

    public function show($id)
    {
        return $this->publisherRepository->getPublisher($id);
    }
}
