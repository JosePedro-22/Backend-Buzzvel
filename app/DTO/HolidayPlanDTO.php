<?php

namespace App\DTO;


use Illuminate\Http\Request;

class HolidayPlanDTO
{
    public static function fromRequest(Request $request): array
    {
        return [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'participants' => $request->input('participants', []),
        ];
    }
}
