<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Routes;


class permetion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:permetion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Fetch all routes from web.php
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $route) {

            $uri = $route->uri();
            if (strpos($uri, '-') !== false || strpos($uri, 'api') !== false) {
                continue;
            }
            Routes::insert([
                'uri' => $uri,
            ]);
        }
    }
}
