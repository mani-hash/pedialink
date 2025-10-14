<?php

namespace App\Controllers\Doctor;

use Library\Framework\Http\Request;

class ChildProfileController
{
    public function index(Request $request)
    {
        // Logic to retrieve and display the child's profile
        return view("doctor/childprofile");
    }
}