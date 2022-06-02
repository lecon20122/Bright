<?php

namespace App\Http\Controllers;

use App\Models\ReservationDay;
use App\Models\ReservationTime;
use Illuminate\Http\Request;

class ReservationTimeController extends Controller
{

    public function viewSchedule()
    {
        $reservationTimes = auth()->user()->reservationTimes()->with('reservationDay')->get();
        $days = ReservationDay::all();
        return view('site.modules.user.schedule', [
            'reservationTimes' => $reservationTimes,
            'days' => $days,
        ]);
    }

    public function updateReservationTime(Request $request)
    {
        try {
            foreach ($request->id as $key => $value) {
                $reservationTime = ReservationTime::find($value);

                $reservationTime->update([
                    "from" => $request->from[$key],
                    "to" => $request->to[$key],
                    "reservation_day_id" => $request->reservation_day_id[$key]
                ]);
            }
            return redirect()->back()->with('success', 'updated successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function createSchedule()
    {
        $days = ReservationDay::all();
        return view('site.modules.user.schedule-create', [
            'days' => $days,
        ]);
    }

    public function storeScheduleTime(Request $request)
    {
        try {
            auth()->user()->reservationTimes()->create($request->all());
            return redirect()->back()->with('success', 'created successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
