<?php

namespace App\Http\Controllers;

use Database\Seeders\DatabaseSeeder;

class SeedController extends Controller
{
    public function seed()
    {
        $credentials = app(DatabaseSeeder::class)->run();

        return response()->json($credentials);
    }
}
