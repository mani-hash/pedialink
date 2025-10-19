<?php

namespace App\Models;
use Library\Framework\Core\Model;

class Appointment extends Model
{

    protected static string $table = "appointments";

    protected array $fillable = ["patient_id", "staff_id", "requested_by", "datetime", "location","status","purpose","notes","cancled_by"];



}