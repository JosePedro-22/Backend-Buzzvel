<?php

namespace App\Repository\Eloquent;

use App\Models\HolidayPlan;
use App\Repository\HolidayPlanRepositoryInterface;

class HolidayPlanRepository extends BaseRepository implements HolidayPlanRepositoryInterface
{
     public function __construct()
     {
         parent::__construct(new HolidayPlan());
     }
}
