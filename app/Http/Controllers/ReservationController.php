<?php

namespace App\Http\Controllers;

use App\Enums\DataBaseEnum;
use App\Models\Reservation;
use App\Models\ReservationDay;
use App\Models\ReservationTime;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function getReservations()
    {
        $user = auth()->user();
        $totalSales = 0;
        if ($user->type == DataBaseEnum::PATIENT) {
            $reservations = $user->reservations()->paginate(5);
        } else {
            $reservations = $user->doctorReservations()->with('reservationTime')->paginate(5);
            $totalSales = $user->doctorReservations()->sum('price');
            // dd($user);
        }

        return view(
            'site.modules.user.appointments',
            [
                'reservations' => $reservations,
                'totalSales' => $totalSales,
            ]
        );
    }



    public function reserveAppointment(ReservationTime $reservationTime, User $user, User $doctor)
    {
        try {
            $user->reservations()->attach($reservationTime->id, [
                'doctor_id' => $doctor->id,
                'price' => $doctor->price,
            ]);
            return Redirect()->back()->with('success', `Doctor Appointment is submitted successfully`);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function toggleApprovalForReservation(Reservation $reservation)
    {
        try {
            $reservation->is_approved = !$reservation->is_approved;
            $reservation->save();
            return Redirect()->back()->with('success', `reservation $reservation->id is approved successfully`);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
