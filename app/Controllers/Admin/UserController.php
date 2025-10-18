<?php

namespace App\Controllers\Admin;
use App\Services\Admin\AdminUserService;
use Library\Framework\Http\Request;

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

    public function createAdmin(Request $request)
    {
        $name = $request->input("name");
        $email = $request->input("email");
        $type = $request->input("type");

        $errors = $this->adminUserService
            ->validateAdminUser($name, $email, $type);

        if (count($errors) !== 0) {
            return redirect(route("admin.user.admin"))
                ->withInput([
                    "name" => $name,
                    "email" => $email
                ])
                ->withErrors($errors)
                ->with("create", true);
        }

        return redirect(route("admin.user.admin"))
            ->withMessage("success");
    }

    public function admin()
    {
        $admins = $this->adminUserService->getAdminDetails();

        return view('admin/user/admin', [
            "admins" => $admins,
        ]);
    }
}