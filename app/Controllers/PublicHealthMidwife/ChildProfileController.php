<?php

namespace App\Controllers\PublicHealthMidwife;

use App\Models\Child;
use App\Services\ChildService;
use Library\Framework\Http\Request;

class ChildProfileController
{
    public ChildService $childService;

    public function __construct()
    {
        $this->childService = new ChildService();
    }

    public function index(Request $request)
    {
        $children = $this->childService->getAllChildren();
        return view("phm/childprofiles", ['children' => $children]);
    }
}