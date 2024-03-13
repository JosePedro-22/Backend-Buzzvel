<?php

namespace App\Domain\User\Repository;

use App\Models\User;
use App\Repositories\Eloquent\BaseLoginUserRepository;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends BaseLoginUserRepository implements UserRepositoryInterface
{
     public function __construct()
     {
         parent::__construct(new User());
     }
}
