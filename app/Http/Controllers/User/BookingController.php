<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{


    public function book(Request $request)
    {


        // Step 1: Store form data in session
        if ($request->isMethod('post')) {

//            $step1Data = $request->only(['phone', 'email', 'rental_time', 'attendees']);
//            session()->put('booking.step1', $step1Data);
            return redirect()->route('booking.book')->with('success', 'Step 1 data saved');
        }

        // Step 2: Store form data in session
        if ($request->isMethod('put')) {
//            $step2Data = $request->only(['payment_type', 'payment_data']);
//            session()->put('booking.step2', $step2Data);
            return redirect()->route('booking.book')->with('success', 'Step 2 data saved');
        }

        // Step 3: Save data to database
        if ($request->isMethod('patch')) {
//            $step3Data = $request->only(['confirmation_data']);
//
//            // Retrieve data from session
//            $step1Data = session()->get('booking.step1');
//            $step2Data = session()->get('booking.step2');
//
//            // Create a new booking instance
//            $booking = new Booking();
//            $booking->phone = $step1Data['phone'];
//            $booking->email = $step1Data['email'];
//            // Populate with other relevant data
//
//            // Save the booking to the database
//            $booking->save();
//
//            // Clear session data
//            session()->forget('booking');

            return redirect()->route('booking.confirmation')->with('success', 'Booking saved');
        }

        return inertia('User/Booking/Book');
    }


}
