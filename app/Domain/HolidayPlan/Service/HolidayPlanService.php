<?php

namespace App\Domain\HolidayPlan\Service;

use App\Domain\HolidayPlan\Repository\PlanRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class HolidayPlanService
{
    public function __construct(
        protected PlanRepository $planRepository
    ){}

    public function showAll(): Collection
    {
        return $this->planRepository->all();
        //montar um try cath para caso nao volte nada
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function createPlan(array $request): Model
    {
        return $this->planRepository->create($request);
        //montar um try cath para caso dê erro
    }

    public function showId(int $id): Model
    {
        return $this->planRepository->find($id);
        //montar um try cath para caso nao ache o id
    }

    public function updatePlan(int $id, array $request): Model
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
