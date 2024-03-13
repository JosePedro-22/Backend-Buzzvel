<?php

namespace App\Domain\User\DTO;

use Illuminate\Http\Request;

class CredentialsDTO
{
    public static function fromRequest(Request $request): array
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }
}
