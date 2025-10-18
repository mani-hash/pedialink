<?php

namespace App\Services\Admin;

use App\Models\AdminType;
use App\Models\User;

class AdminUserService
{
    public function getAdminDetails()
    {
        $admins = User::query()->where("role", "=", "admin")->get();

        $resource = [];

        foreach ($admins as $admin) {
            $resource[] = [
                "id" => $admin->id,
                "name" => $admin->name,
                "email" => $admin->email,
                "type" => $admin->getRole()->getAdminType(),
            ];
        }

        return $resource;
    }
}