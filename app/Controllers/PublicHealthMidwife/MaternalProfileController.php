<?php

namespace App\Controllers\PublicHealthMidwife;

use Library\Framework\Http\Request;
use App\Models\ParentM;
use App\Models\User;
use App\Services\maternalrecordService;

class MaternalProfileController
{
    protected $maternalrecordService;

    public function __construct()
    {
        $this->maternalrecordService = new maternalrecordService();
    }

    public function index(Request $request)
    {
        $parents = ParentM::all();

        $items = array_map(function ($parent) {
            $user = User::find($parent->id);
            $latestRecord = $this->maternalrecordService->getLatestMaternalRecord($parent->id);
            $area = $parent->getArea();

            return [
                'id' => $parent->id,
                'name' => $user->name ?? 'N/A',
                'age' => '-',
                'address' => $parent->address ?? '-',
                'type' => $parent->type ?? '-',
                'gs_devision' => $area->code ?? '-',
                'nic' => $parent->nic ?? ($user->nic ?? '-'),
                'latest_health_record' => $latestRecord,
            ];
        }, $parents ?? []);

        return view("phm/maternalprofiles", [
            'items' => $items,
        ]);
    }
}