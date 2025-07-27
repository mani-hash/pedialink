<?php

use App\Controllers\HomeController;

return [
    ['GET', '/', [HomeController::class, 'home'], 'home'],
];