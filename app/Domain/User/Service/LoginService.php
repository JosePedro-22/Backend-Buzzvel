<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserRepository;
use Illuminate\Http\JsonResponse;

class LoginService
{
    public function __construct(
        protected UserRepository $loginRepository
    ){}

    public function show(string $email): JsonResponse
    {
        $user = $this->loginRepository->find($email);

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
