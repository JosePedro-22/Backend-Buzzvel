<?php

namespace App\Http\Controllers;

use App\Domain\User\Service\UserSeedService;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\JsonResponse;

class SeedController extends Controller
{
    public function __construct(
        protected UserSeedService $userSeedService
    ){}

    public function seed():JsonResponse
    {
        return $this->userSeedService->create();
    }
}
