<?php

namespace App\Repository\Eloquent;

use App\Models\HolidayPlan;
use App\Repository\RepositoryInterface;

class BaseRepository implements RepositoryInterface
{
    public function __construct
    (
        protected HolidayPlan $holidayPlan
    ){}

    public function all(){
        return $this->holidayPlan->all();
    }

    public function find(int $id){

        return $this->holidayPlan->find($id);
    }

    public function create(array $data){
        return $this->holidayPlan->create($data);
    }

    public function update(int $id, array $data){
        $record = $this->holidayPlan->find($id);
        $record->update($data);
        return $record;
    }

    public function delete(int $id){
        $record = $this->holidayPlan->find($id);
        $record->delete();
        return $record;
    }
}
