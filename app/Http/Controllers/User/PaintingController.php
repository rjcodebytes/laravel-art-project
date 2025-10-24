<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaintingEnquiryMail;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::latest()->paginate(10);
        return view('collection', compact('paintings'));
    }

    // Fetch single painting details
    public function show($slug)
    {
        $painting = Painting::where('slug', $slug)->firstOrFail();
        return view('collection.show', compact('painting'));
    }

    public function enquiry($slug)
    {
        $painting = Painting::where('slug', $slug)->firstOrFail();
        return view('collection.enquiry', compact('painting'));
    }

    public function sendEnquiry(Request $request, $slug)
    {
        $painting = Painting::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        // Prepare data for email
        $details = [
            'painting' => $painting,
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'messageContent' => $validated['message'],
        ];

        // Send mail to admin
        Mail::to('yashwantgarud77@gmail.com')->send(new PaintingEnquiryMail($details));

        return back()->with('success', 'Your enquiry has been sent successfully! We will contact you soon.');
    }

}
