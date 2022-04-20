<?php

namespace Database\Seeders;

use App\Models\BookPublisher;
use Illuminate\Database\Seeder;

class BookPublisherSeeder extends Seeder
{
    public function run()
    {
        BookPublisher::factory()
            ->count(50)
            ->create();
    }
}
