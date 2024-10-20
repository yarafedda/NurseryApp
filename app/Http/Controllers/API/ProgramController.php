<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use App\Http\Requests\StaffRequest;
use App\Models\Program;
use App\Models\Staff;
use App\Http\Controllers\API\StaffController;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programs = Program::all();
        $staffs = Staff::all();
        
        if ($request->expectsJson()) {
          return response()->json($programs);
        }

        
        return view('home', compact('programs', 'staffs'));
        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequest $request)
    {
        $validatedData = $request->validated();

        
        $imagePath = null;
        if ($request->hasFile('image')) {
          $imageName = time().'.'.$request->image->extension();  
          $request->image->move(public_path('images'), $imageName);
          $imagePath = 'images/'.$imageName;
        }

        // Create the program with the image path
        $new_program = Program::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'duration' => $validatedData['duration'],
        'image' => $imagePath,
        'staff_id'=>$validatedData['staff_id']
    ]);


        return response()->json([
            'status'=>true,
            'message'=>"new program is created successfully",
            'data'=>$new_program,
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
