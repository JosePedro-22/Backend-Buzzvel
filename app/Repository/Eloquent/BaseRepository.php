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

    public function findById($id){
        return $this->holidayPlan->findById($id);
    }

    public function create(array $data){
        return $this->holidayPlan->create($data);
    }

    public function update($id, array $data){
        return $this->holidayPlan->update($id, $data);
    }

    public function delete($id){
        return $this->holidayPlan->delete($id);
    }
}
