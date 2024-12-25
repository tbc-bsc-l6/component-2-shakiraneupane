<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function handleSection($section)
    {
        // Define valid sections
        $validSections = ['users', 'products', 'orders', 'reports'];

        // Check if the requested section is valid
        if (in_array($section, $validSections)) {
            // Return the corresponding view
            return view("admin.{$section}");
        }

        // If the section is invalid, show a 404 error
        return abort(404, "The requested admin section does not exist.");
    }
}
