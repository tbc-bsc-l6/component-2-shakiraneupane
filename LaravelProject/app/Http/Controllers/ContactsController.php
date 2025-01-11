<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Store a contact message from the user.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',      // Name is required and must be a string with a max length of 255 characters
            'email' => 'required|email|max:255',      // Email is required, must be a valid email format, and a max length of 255 characters
            'message' => 'required|string',           // Message is required and must be a string
        ]);

        // Save the contact message into the database
        Contact::create([
            'name' => $request->name,           // Name from the form input
            'email' => $request->email,         // Email from the form input
            'message' => $request->message,     // Message from the form input
        ]);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
