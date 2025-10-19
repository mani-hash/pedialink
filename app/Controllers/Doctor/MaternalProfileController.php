<?php

namespace App\Controllers\Doctor;

use Library\Framework\Http\Request;

class MaternalProfileController
{
    public function index(Request $request)
    {
        return view("doctor/maternalprofile");
    }
}