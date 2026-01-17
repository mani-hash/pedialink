<?php

namespace App\Controllers\PublicHealthMidwife;

use Library\Framework\Http\Request;
use App\Services\MaternalStatService;

class MaternalHealthController
{
    protected $maternalStatService;

    public function __construct()
    {
        $this->maternalStatService = new MaternalStatService();
    }

    public function index(Request $request, int $id)
    {
        $maternalStats = $this->maternalStatService->getMaternalStatByMaternalId($id);
        return view("phm/maternalhealth", [
            'parentId' => $id,
            'items' => $maternalStats,
        ]);
    }
}