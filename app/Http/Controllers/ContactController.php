<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
            'artwork' => 'nullable|string|max:200',
        ]);

        try {
            Mail::to('yashwantgarud77@gmail.com')->send(new ContactFormMail([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'artwork' => $validated['artwork'] ?? null,
                'message' => $validated['message'],
                'ip' => $request->ip(),
            ]));

            return back()->with('success', 'Your message has been sent successfully! I will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send your message. Error: ' . $e->getMessage());
        }
    }
}
