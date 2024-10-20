<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GuardianRequest;
use App\Models\Guardian;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::all();
        return response()->json($guardians);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardianRequest $request)
    {
        
        $existing_guardian = Guardian::where('email', $request->email)->first();

        if ($existing_guardian) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Guardian already exists! You can now register a child.',
                    'guardian_id' => $existing_guardian->id,
                ]);
            }
        
            
            return redirect()->route('child.registration', ['guardian_id' => $existing_guardian->id])
                ->with('message', 'Guardian already exists! You can now register a child.');
        }

        $new_guardian = Guardian::create($request->all());
        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Guardian registered successfully!',
                'guardian_id' => $new_guardian->id,
            ]);
        }

        
        return redirect()->route('child.registration', ['guardian_id' => $new_guardian->id]);       
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
