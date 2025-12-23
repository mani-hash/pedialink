<?php

namespace App\Controllers\PublicHealthMidwife;

use Library\Framework\Http\Request;

class MaternalHealthController
{
    public function index(Request $request, int $id)
    {
        return view("phm/maternalhealth", [
            'maternalId' => $id,
        ]);
    }
}