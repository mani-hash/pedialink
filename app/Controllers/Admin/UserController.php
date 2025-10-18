<?php

namespace App\Controllers\Admin;
use App\Services\Admin\AdminUserService;

class UserController
{
    private AdminUserService $adminUserService;

    public function __construct()
    {
        $this->adminUserService = new AdminUserService();
    }

    public function overview()
    {
        return view('admin/user/overview');
    }

    public function parentAccountApproval()
    {
        return view('admin/user/parent');
    }

    public function admin()
    {
        $admins = $this->adminUserService->getAdminDetails();

        return view('admin/user/admin', [
            "admins" => $admins,
        ]);
    }
}