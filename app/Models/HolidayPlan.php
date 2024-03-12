<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

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
