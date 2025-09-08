<?php

use App\Controllers\Admin\ChildController;
use App\Controllers\Admin\UserController;
use App\Controllers\AdminController;

return [
    ['GET', '/admin/dashboard', [AdminController::class, 'dashboard'], 'admin.dashboard', ['admin']],
    ['GET', '/admin/user/overview', [UserController::class, 'overview'], 'admin.user.overview', ['admin']],
    ['GET', '/admin/user/parent', [UserController::class, 'parentAccountApproval'], 'admin.user.parent', ['admin']],
    ['GET', '/admin/user/admin', [UserController::class, 'admin'], 'admin.user.admin', ['admin']],
    ['GET', '/admin/child-profiles/overview', [ChildController::class, 'overview'], 'admin.child.overview', ['admin']],
];