<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
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

    public function cities()
    {
        return $this->hasMany(City::class, 'province_code', 'code');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'province_code', 'code');
    }
}
