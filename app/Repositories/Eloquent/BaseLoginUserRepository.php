<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseLoginUserRepository implements UserRepositoryInterface
{
    public function __construct(
        protected User $user
    ){}

    public function find(string $email): Model
    {
        return $this->user->where('email', $email)->first();
    }
}
