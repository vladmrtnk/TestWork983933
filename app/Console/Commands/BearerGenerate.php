<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class BearerGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bearer:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create bearer token for api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hash = Str::random(60);
        file_put_contents(base_path('.env'), str_replace(
            'BEARER' . '=' . env('BEARER'), 'BEARER=' . $hash, file_get_contents(base_path('.env'))
        ));

        print_r('Bearer: ' . $hash);
    }
}
