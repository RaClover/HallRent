<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class HallListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Partner/Halls/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Partner/Halls/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        if ($request->isMethod('post')) {
            if ($request->has('step') && $request->step === 1) {
                $request->validate([
                    'type' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zip' => 'required',
                ]);

                // Store the step1 data in the session
                session([
                    'listStep1' => [
                        'type' => $request->type,
                        'city' => $request->city,
                        'state' => $request->state,
                        'zip' => $request->zip,
                    ],
                ]);
                // If validation passes, proceed to next step
                return redirect()->route('partner.hallList.create')->with('success', 'Step 1 completed');
            } elseif ($request->has('step') && $request->input('step') === '22') {
                // Step 2: Validate and save hall types
                // Perform validation and saving logic for hall types

                // If validation fails, return with errors

                // If validation passes, proceed to next step
                return redirect()->route('partner.hallList.create')->with('success', 'Step 2 completed');
            } elseif ($request->has('step') && $request->input('step') === '3') {
                // Step 3: Validate and save hall types
                // Perform validation and saving logic for hall types

                // If validation fails, return with errors

                // If validation passes, proceed to next step
                return redirect()->route('partner.hallList.create')->with('success', 'Step 3 completed');
            } elseif ($request->has('step') && $request->input('step') === '4') {
                // Step 4: Validate and save hall types
                // Perform validation and saving logic for hall types

                // If validation fails, return with errors

                // If validation passes, proceed to next step
                return redirect()->route('partner.hallList.create')->with('success', 'Step 4 completed');
            } elseif ($request->has('step') && $request->input('step') === '5') {
                // Step 5: Validate and save additional details
                // Perform validation and saving logic for additional details

                // If validation fails, return with errors

                // If validation passes, form submission completed
                return redirect()->route('booking.confirmation')->with('success', 'Form submitted successfully');
            }
        }
        return redirect()->route('partner.hallList.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Partner/Show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Partner/Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
