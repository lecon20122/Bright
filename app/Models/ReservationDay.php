<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDay extends Model
{
    use HasFactory;

    public function reservationTime()
    {
        return $this->hasMany(ReservationTime::class);
    }
}
