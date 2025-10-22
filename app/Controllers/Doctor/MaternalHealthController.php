<?php

namespace App\Controllers\Doctor;
use App\Services\MaternalStatService;

use Library\Framework\Http\Request;

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
        return view("doctor/maternalhealth", [
            "items" => $maternalStats
        ]);
    }

    public function createMaternalRecord(Request $request, $id)
    {

        $maternalId = $id;
        $recordedAt = $request->input('recoded_at');
        $bmi = $request->input('bmi');
        $bloodPressure = $request->input('blood_pressure');
        $bloodSugar = $request->input('blood_sugar');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $fundalHeight = $request->input('fundal_height');
        $healthStatus = $request->input('health_request');
        $pregnancyStage = $request->input('pregnancy_stage');
        $notes = $request->input('notes');

        $errors = $this->maternalStatService->validateMaternalStatData($recordedAt, $bmi, $bloodPressure, $bloodSugar, $weight, $height, $fundalHeight, $healthStatus, $pregnancyStage, $notes);

        if (count($errors) !== 0) {
            return redirect(route("doctor.maternal.health", ["id" => $id]))
                ->withInput([
                    "recorded_at" => $recordedAt,
                    "bmi" => $bmi

                ])
                ->withErrors($errors)
                ->with("create", true);


        }
        ;

        $this->maternalStatService->createMaternalStat($id, $recordedAt, $bmi, $bloodPressure, $bloodSugar, $weight, $height, $fundalHeight, $healthStatus, $pregnancyStage, $notes);
        return redirect(route("doctor.maternal.health", ["id" => $id]))
            ->withMessage(
                "Health record was successfully created",
                "Health Record Created",
                "success",
            );






    }
}