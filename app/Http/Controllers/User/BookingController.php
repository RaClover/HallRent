<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use function Sodium\add;

class BookingController extends Controller
{

    public function book(Request $request, Hall $hall)
    {

        $type = $hall->type;
        $images = $hall->type;
        $address = $hall->address;
        // Check if it's a GET request and handle the form data
        if ($request->isMethod('get')) {
            $validator = Validator::make($request->all(), [
                'date' => 'required',
                'startTime' => 'required',
                'endTime' => 'required',
            ]);

            if ($validator->fails()) {
                return inertia('User/Booking/Book', [
                    'hall' => $hall,
                    'type' => $type,
                    'images' => $images,
                    'address' => $address
                ]);
            } else {
                return inertia('User/Booking/Book', [
                    'hall' => $hall,
                    'type' => $type,
                    'images' => $images,
                    'address' => $address,
                    'selectedDate' => $request->input('date'),
                    'selectedStartTime' => $request->input('startTime'),
                    'selectedEndTime' => $request->input('endTime'),
                ]);
            }
        }

        // Step 1: Store form data in session
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'activity' => 'required',
                'guests' => 'required',
                'alcohol' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('booking.book', [
                    'hall' => $hall,
                    'type' => $type,
                    'images' => $images,
                    'address' => $address,
                ])->withErrors($validator);
            }

            // Store the step1 data in the session
            session([
                'step1Data' => [
                    'activity' => $request->input('activity'),
                    'guests' => $request->input('guests'),
                    'date' => $request->input('date'),
                    'startTime' => $request->input('startTime'),
                    'endTime' => $request->input('endTime'),
                    'alcohol' => $request->input('alcohol'),
                ],
            ]);

            // Redirect to the next step (PUT request)
            return redirect()->route('booking.book', [
                'hall' => $hall,
                'type' => $type,
                'images' => $images,
                'address' => $address,
            ])->with('success', 'Step 1 data saved');
        }

        // Step 2: Store form data in session
        if ($request->isMethod('put')) {
            return redirect()->route('booking.book', [
                'hall' => $hall,
                'type' => $type,
                'images' => $images,
                'address' => $address,
            ])->with('success', 'Step 2 data saved');
        }

        // Step 3: Save data to the database
        if ($request->isMethod('patch')) {
            // Retrieve the step1 data from the session
            $step1Data = session('step1Data');

            // Perform any necessary database operations using the $hall and $step1Data

            return redirect()->route('booking.confirmation')->with('success', 'Booking saved');
        }

        return inertia('User/Booking/Book', [
            'hall' => $hall,
            'type' => $type,
            'images' => $images,
            'address' => $address,
        ]);
    }

}
