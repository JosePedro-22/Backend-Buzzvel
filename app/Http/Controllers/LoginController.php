<?php

namespace App\Http\Controllers;

use App\Domain\User\DTO\CredentialsDTO;
use App\Domain\User\Service\LoginService;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ){}

    public function login(LoginFormRequest $request): JsonResponse
    {
        $credentials = CredentialsDTO::fromRequest($request);

        if (!Auth::attempt($credentials))
            throw ValidationException::withMessages(
                ['email' => ['The provided credentials are incorrect.']]
            );

        return $this->loginService->show($credentials['email']);
    }
}
