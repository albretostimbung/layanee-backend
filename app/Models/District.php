<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toArray()
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
        ];
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'district_code', 'code');
    }
}
