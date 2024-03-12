<?php

namespace App\Repository\Eloquent;

use App\Domain\HolidayPlan\Entities\HolidayPlan;
use App\Domain\HolidayPlan\Repositories\HolidayPlanRepositoryInterface;

class HolidayPlanRepository extends BaseRepository implements HolidayPlanRepositoryInterface
{
     public function __construct()
     {
         parent::__construct(new HolidayPlan());
     }
}
