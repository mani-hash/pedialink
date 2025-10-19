<?php

namespace App\Controllers\Doctor;

use Library\Framework\Http\Request;

class NotificationController
{
    public function index(Request $request)
    {
        return view("doctor/notification");
    }
}