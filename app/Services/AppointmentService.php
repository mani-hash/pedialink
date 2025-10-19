<?php

namespace App\Services;
use App\Models\Appointment;



class AppointmentService
{

    public function getAppointmentDetails(){
         $appointments = Appointment::query()->get();

        $resource = [];

        foreach ($appointments as $appointment) {
            $resource[] = [
                "id" => $appointment->id,
                "patient_id" => $appointment->patient_id,
                "staff_id" => $appointment->staff_id,
                "requested_by" => $appointment->requested_by,
                "datetime" => $appointment->datetime,
                "location" => $appointment->location,
                "status" => $appointment->status,
                "purpose" => $appointment->purpose,
                "notes" => $appointment->notes,
                "cancled_by" => $appointment->cancled_by,
            ];
        }

        return $resource;
    }

    public function createAppointment(array $data): Appointment
    {
        $appointment = new Appointment();
        foreach ($data as $key => $value) {
            if (in_array($key, $appointment->fillable)) {
                $appointment->attributes[$key] = $value;
            }
        }
        $appointment->save();
        return $appointment;
    }
}


?>