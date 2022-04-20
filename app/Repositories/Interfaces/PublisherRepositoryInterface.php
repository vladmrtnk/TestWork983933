<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface PublisherRepositoryInterface
{
    public function getPublisher($id);

    public function getPublishers(Request $request);
}
