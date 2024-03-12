<?php

namespace App\Repository\Eloquent;

use App\Models\HolidayPlan;
use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    public function __construct(
        protected HolidayPlan $holidayPlan
    ){}

    public function all(): Collection
    {
        return $this->holidayPlan->all();
    }

    public function find(int $id): Model{
        return $this->holidayPlan->find($id);
    }

    public function create(array $data):Model{
        return $this->holidayPlan->create($data);
    }

    public function update(int $id, array $data): Model{
        $record = $this->holidayPlan->find($id);
        $record->update($data);
        return $record;
    }

    public function delete(int $id): Model{
        $record = $this->holidayPlan->find($id);
        $record->delete();
        return $record;
    }
}
