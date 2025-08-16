<?php

use App\Controllers\AuthController;

return [
    ['GET', '/parent/register', [AuthController::class, 'parentRegister'], 'parent.register'],
    ['GET', '/parent/login', [AuthController::class, 'parentLogin'], 'parent.login'],
    ['GET', '/staff/login', [AuthController::class, 'staffLogin'], 'staff.login'],

];