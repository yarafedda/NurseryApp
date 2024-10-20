<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{
    
    public function showRegistrationForm()
    {
        return view('register');  
    }

    public function register(RegistrationRequest $request){
       
        $user=new User();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=bcrypt($request->password);
        $user->save();

        $token=$user->createToken('authtoken')->plainTextToken;
        

        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $token,
                'data' => $user
            ]);
        }
        
        return redirect()->route('login')->with('success', 'User registered successfully!');
    }

    

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(LoginRequest $request){
        $credentials=$request->only(['email','password']);
        if(Auth::attempt($credentials)){
            $user=Auth::user();
            $token=$user->createToken('authtoken')->plainTextToken;

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User logged in successfully',
                    'token' => $token,
                    'data' => $user
                ]);
            }
            return redirect()->route('home');
        }else{

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid email or password. Please try again.'
                ], 401); 
            }
            return redirect()->back()->with('error', 'Invalid email or password. Please try again.');
        }
    }



    public function logout(Request $request){
    
      $request->user()->tokens()->delete();

      if ($request->wantsJson()) {
        return response()->json([
        'status' => true,
        'message' => 'Logged out successfully',
        ]);
      }
      return redirect()->route('login');
    }

}
