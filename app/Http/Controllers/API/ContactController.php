<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $details = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'userMessage' => $request->message,
    ];

    
    Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($details));

    if ($request->wantsJson()) {
        return response()->json([
          'status' => true,
          'message' => "Your message has been sent successfully!",
          'data' => $details,
        ]);
      }
      

    return back()->with('success', 'Your message has been sent successfully!');
}

}
