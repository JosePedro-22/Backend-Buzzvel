<?php

namespace App\Repositories\Eloquent;

use App\Models\HolidayPlan;
use App\Repositories\HolidayRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseHolidayRepository implements HolidayRepositoryInterface
{
    public function __construct(
        protected HolidayPlan $holidayPlan,
        protected int $notFoundCode = 404
    ){}

    protected function findOrFail(int $id): Model
    {
        $record = $this->holidayPlan->find($id);

        if ($record === null) {
            throw new Exception('Holiday plan not found', $this->notFoundCode);
        }

        return $record;
    }
    public function all(): Collection
    {
        $all = $this->holidayPlan->all();
        if($all->isEmpty()) throw new Exception('Holiday plan not found', $this->notFoundCode);
        return $all;
    }

    public function find(int $id): Model
    {
        return $this->findOrFail($id);
    }

    public function create(array $data): Model
    {
        return $this->holidayPlan->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $record = $this->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete(int $id): Model
    {
        $record = $this->findOrFail($id);
        $record->delete();
        return $record;
    }
}
