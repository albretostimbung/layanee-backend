<?php

namespace App\Services;

use App\Models\OpeningHour;

class OpeningHourService
{
    public function create($request)
    {
        $exist = OpeningHour::query()
            ->where('service_id', $request->service_id)
            ->where('day', $request->day)
            ->first();

        if (!$exist) return OpeningHour::create($request->validated());

        return 'Opening hour already exist';
    }

    public function update($request, $openingHour)
    {
        $exist = OpeningHour::query()
            ->where('service_id', $request->service_id)
            ->where('day', $request->day)
            ->where('open', $request->open)
            ->where('close', $request->close)
            ->first();

        if (!$exist) return $openingHour->update($request->validated());

        return 'Opening hour already exist';
    }
}
