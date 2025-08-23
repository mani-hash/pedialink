<?php

use App\Controllers\AuthController;

return [
    ['GET', '/parent/register', [AuthController::class, 'parentRegisterInitial'], 'parent.register', ['guest']],
    ['POST', '/parent/register', [AuthController::class, 'parentVerifyInitial'], 'parent.register.submit', ['guest']],
    ['GET', '/parent/register/final', [AuthController::class, 'parentRegisterFinal'], 'parent.register.final', ['guest']],
    ['POST', '/parent/register/final', [AuthController::class, 'parentVerifyFinal'], 'parent.register.final.submit', ['guest']],
    ['GET', '/parent/login', [AuthController::class, 'parentLogin'], 'parent.login', ['guest']],
    ['GET', '/staff/login', [AuthController::class, 'staffLogin'], 'staff.login', ['guest']],
    ['GET', '/forgot-password', [AuthController::class, 'forgotPassword'], 'forgot.password', ['guest']],
];