<?php

namespace App\Http\Controllers;

use App\Domain\HolidayPlan\DTO\HolidayPlanDTO;
use App\Domain\HolidayPlan\Service\HolidayPlanService;
use App\Http\Requests\HolidayPlanFormRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class HolidayPlanController extends Controller
{
    public function __construct(
        protected HolidayPlanService $planService
    ){}

    public function index(): Collection
    {
        return $this->planService->showAll();
    }

    public function store(HolidayPlanFormRequest $request): Model
    {
        $array = HolidayPlanDTO::fromRequest($request);
        return $this->planService->createPlan($array);
    }

    public function show(string $id): Model
    {
        return $this->planService->showId((int)$id);
    }

    public function update(HolidayPlanFormRequest $request, string $id): Model
    {
        $array = HolidayPlanDTO::fromRequest($request);
        return $this->planService->updatePlan((int)$id,$array);
    }

    public function destroy(string $id): Model
    {
        return $this->planService->deletePlan((int)$id);
    }

    public function generatePDF(string $id): Response
    {
        return $this->planService->DomPDF((int)$id);
    }
}
