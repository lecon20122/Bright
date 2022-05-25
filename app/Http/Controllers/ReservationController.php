<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationDay;
use App\Models\ReservationTime;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserveAppointment(ReservationTime $reservationTime, User $user)
    {
        try {
            $user->reservations()->attach($reservationTime->id);
            return Redirect()->back()->with('success', `Doctor Appointment is submitted successfully`);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
