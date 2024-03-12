<?php

namespace App\Repository\Eloquent;

use App\Domain\HolidayPlan\Repositories\HolidayPlanRepositoryInterface;
use App\Models\HolidayPlan;

class HolidayPlanRepository extends BaseRepository implements HolidayPlanRepositoryInterface
{
     public function __construct()
     {
         parent::__construct(new HolidayPlan());
     }
}
