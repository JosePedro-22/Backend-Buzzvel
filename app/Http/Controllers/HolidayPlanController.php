<?php

namespace App\Http\Controllers;

use App\Domain\HolidayPlan\DTO\HolidayPlanDTO;
use App\Domain\HolidayPlan\Service\HolidayPlanService;
use App\Http\Requests\HolidayPlanFormRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use PHPUnit\Event\Code\Throwable;

class HolidayPlanController extends Controller
{

    public function __construct(
        protected HolidayPlanService $planService,
    ){}

    public function index(): Collection | JsonResponse
    {
        try {
            return $this->planService->showAll();
        } catch (\Exception $exception) {
            logger()->error('No Holiday Plans found: ' . $exception->getMessage());
            return response()->json(['error' => 'No Holiday Plans found'], $exception->getCode());
        }
    }

    public function store(HolidayPlanFormRequest $request): Model
    {
        $array = HolidayPlanDTO::fromRequest($request);
        return $this->planService->createPlan($array);
    }

    public function show(string $id): Model | JsonResponse
    {
        try {
            return $this->planService->showId((int)$id);
        } catch (\Exception $exception) {
            logger()->error('Holiday plan not found: ' . $exception->getMessage());
            return response()->json(['error' => 'Holiday plan not found'], $exception->getCode());
        }
    }

    public function update(HolidayPlanFormRequest $request, string $id): Model | JsonResponse
    {
        try {
            $array = HolidayPlanDTO::fromRequest($request);
            return $this->planService->updatePlan((int)$id,$array);
        } catch (\Exception $exception) {
            logger()->error('Holiday plan not found: ' . $exception->getMessage());
            return response()->json(['error' => 'Holiday plan not found'], $exception->getCode());
        }
    }

    public function destroy(string $id): Model | JsonResponse
    {
        try {
            return $this->planService->deletePlan((int)$id);
        } catch (\Exception $exception) {
            logger()->error('Holiday plan not found: ' . $exception->getMessage());
            return response()->json(['error' => 'Holiday plan not found'], $exception->getCode());
        }
    }

    public function generatePDF(string $id): Response | JsonResponse
    {
        try {
            return $this->planService->DomPDF((int)$id);
        } catch (\Exception $exception) {
            logger()->error('Holiday plan not found: ' . $exception->getMessage());
            return response()->json(['error' => 'Holiday plan not found'], $exception->getCode());
        }

    }
}
