<?php

namespace App\Domain\HolidayPlan\Repository;

use App\Models\HolidayPlan;
use App\Repositories\Eloquent\BaseHolidayRepository;

class PlanRepository extends BaseHolidayRepository implements HolidayPlanRepositoryInterface
{
     public function __construct()
     {
         parent::__construct(new HolidayPlan());
     }
}
