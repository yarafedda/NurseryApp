<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StaffRequest;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $staffs = Staff::all();

    
    if ($staffs->isEmpty()) {
        if ($request->expectsJson()) {
            return response()->json([
                'status' => false,
                'message' => 'No staff found'
            ], 404);
        }
        return view('home')->with('message', 'No staff found.');
    }

    if ($request->expectsJson()) {
        return response()->json($staffs);
    }

        return view('home', compact('staffs'));
        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        $new_staff=Staff::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>"new staff is created successfully",
            'data'=>$new_staff,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
