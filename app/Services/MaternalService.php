<?php

namespace App\Services;

use App\Models\Maternal;
use App\Models\ParentM;
use App\Models\Area;
use App\Models\User;

class MaternalService
{
    public function getAllMaternal()
    {
        $maternals = Maternal::all();

        $resource = [];
        foreach ($maternals as $maternal) {
            $resource[] = [
                'id' => $maternal->id,
                'parent_id' => $maternal->parentId,
                'type' => $maternal->type,
                'stage' => $maternal->stage,
                'pregnancy_date' => $maternal->pregnancyDate,
                'health_status' => $maternal->healthStatus,
                'additional_info' => $maternal->additionalInfo,
            ];
        }

        return $resource;
    }

    public function calculatePregnancyDuration( $date)
    {
        $start = new \DateTime($date);
        $end = new \DateTime(); 
        $interval = $start->diff($end);

        return $interval->days;
    }

    

    public function getMaternalById($id)
    {
        return Maternal::find($id);
    }

    public function getDoctorMaternalDetails($doctorId)
    {//


        $maternals = $this->getAllMaternal();
        $resource = [];
        foreach ($maternals as $maternal) {

            $parentName = User::query()->where('id', '=',$maternal['parent_id'])->first()->name;
            $parentAge = ParentM::query()->where('id', '=',$maternal['parent_id'])->first()->age;
            $parentAddress = ParentM::query()->where('id', '=',$maternal['parent_id'])->first()->address;
            $parentAreaId = ParentM::query()->where('id', '=',$maternal['parent_id'])->first()->area_id;
            $parentArea = Area::query()->where('id', '=',$parentAreaId)->first()->code;


                $resource[] = [
                    'maternal_id' => $maternal['id'],
                    'type' => $maternal['type'],
                    'stage' => $maternal['stage'],
                    'pregnancy_date' => $maternal['pregnancy_date'],
                    'pregnancy_duration_days' => $this->calculatePregnancyDuration( $maternal['pregnancy_date']),
                    'health_status' => $maternal['health_status'],
                    'additional_info' => $maternal['additional_info'],
                    'parent_name' => $parentName,
                    'parent_age' => $parentAge,
                    'parent_address' => $parentAddress,
                    'parent_area' => $parentArea,
                ];

        }
        

        return $resource;
    }

}
