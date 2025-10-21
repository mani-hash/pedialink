<?php

namespace App\Services;

use App\Models\Child;

class ChildService
{
    public function getAllChildren()
    {
        $children = Child::all();

        $resource = [];
        foreach ($children as $child) {
            $resource[] = [
                'id' => $child->id,
                'name' => $child->name,
                'date_of_birth' => $child->date_of_birth,
                'gender' => $child->gender,
                'health_status' => $child->health_status,
                'gs_division' => $child->gs_division,
                'vaccination_status' => $child->vaccination_status,
                'notes' => $child->notes,
            ];
        }

        return $resource;
    }
}