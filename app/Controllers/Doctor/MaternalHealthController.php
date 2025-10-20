<?php

namespace App\Controllers\Doctor;

use Library\Framework\Http\Request;

class MaternalHealthController
{
    public function index(Request $request, int $id)
    {
        return view("doctor/maternalhealth", [
            "id" => $id,
        ]);
    }
}