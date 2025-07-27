<?php

namespace App\Controllers;

use App\Models\User;
use Library\Framework\Http\Request;
use Library\Framework\Http\Response;

class HomeController
{
    public function home(Request $request)
    {
        return view("home/home");
    }
}