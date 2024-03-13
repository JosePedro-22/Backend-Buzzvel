<?php

namespace App\Domain\HolidayPlan\Service;

use App\Domain\HolidayPlan\Repository\PlanRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class HolidayPlanService
{
    public function __construct(
        protected PlanRepository $planRepository
    ){}

    public function showAll(): Collection | null
    {
        return $this->planRepository->all();
    }

    public function createPlan(array $request): Model
    {
        return $this->planRepository->create($request);
    }

    public function showId(int $id): Model | null
    {
        return $this->planRepository->find($id);
    }

    public function updatePlan(int $id, array $request): Model | null
    {
        return $this->planRepository->update($id, $request);
    }

    public function deletePlan(int $id): Model
    {
        return $this->planRepository->delete($id);
    }

    public function DomPDF(int $id): Response
    {
        $data = $this->showId($id);

        $pdf = Pdf::loadView('PDF.pdf', ['data' => $data])->setPaper('a4', 'landscape');

        return $pdf->download('holidayPlan.pdf');
    }
}
