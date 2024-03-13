<?php

namespace App\Domain\User\Service;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\JsonResponse;

class UserSeedService
{
    public function create(): JsonResponse
    {
        $credentials = app(DatabaseSeeder::class)->run();

        return response()->json($credentials);
    }
}
