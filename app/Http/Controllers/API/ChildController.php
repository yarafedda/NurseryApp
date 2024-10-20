<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Program;
use App\Models\Staff;
use App\Http\Requests\ChildrenRequest;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $children=child::all();
        return response()->json($children);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildrenRequest $request)
    {
        
      
      $validatedData = $request->validated();

      
      $existing_child = Child::where('firstname', $validatedData['firstname'])
        ->where('lastname', $validatedData['lastname'])
        ->where('date_of_birth', $validatedData['date_of_birth'])
        ->first();

      if ($existing_child) {
        if ($request->wantsJson()) {
        return response()->json([
            'status' => false,
            'message' => 'Child already exists.',
        ], 400); 
    }
}

      
    $new_child = Child::create([
        'firstname' => $validatedData['firstname'],
        'lastname' => $validatedData['lastname'],
        'date_of_birth' => $validatedData['date_of_birth'],
        'gender' => $validatedData['gender'],
        'guardian_id' => $validatedData['guardian_id'],
    ]);

    

    $programs = Program::all();
    $staffs = Staff::all();
    
    $new_child->programs()->attach($programs->pluck('id')); 
    $new_child->staffs()->attach($staffs->pluck('id')); 
    
    if ($request->wantsJson()) {
      return response()->json([
        'status' => true,
        'message' => "New child is created successfully",
        'data' => $new_child,
      ]);
    }
    
    
    return redirect()->route('register.child', ['guardian_id' => $validatedData['guardian_id']])->with('message', 'child registered successfully register another child if you want.');; 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
