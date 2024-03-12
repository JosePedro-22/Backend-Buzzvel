<?php

namespace App\Domain\HolidayPlan\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class HolidayPlan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =
        [
            'title',
            'description',
            'date',
            'location',
            'participants'
        ];
}
