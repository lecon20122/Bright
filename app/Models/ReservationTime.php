<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTime extends Model
{
    use HasFactory;
    protected $with = ['reservationDay'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations', 'user_id', 'reservation_time_id')->withPivot('is_approved');
    }

    public function reservationDay()
    {
        return $this->belongsTo(ReservationDay::class);
    }
}
