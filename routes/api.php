<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeList;

Route::apiResource('api/employee', EmployeeList::class);