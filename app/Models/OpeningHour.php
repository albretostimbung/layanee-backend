<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'open' => 'datetime',
        'close' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
