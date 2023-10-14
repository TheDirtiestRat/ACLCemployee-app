<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');

Route::post('/loginUser', [AuthenticationController::class, 'login_user']);

// authenticated users can access this routes
Route::middleware('auth')->group(function () {
    Route::delete('/logoutUser', [AuthenticationController::class, 'logout_user']);

    Route::resource('employee', EmployeeController::class);

    // use for ajax search
    Route::get('/search', [
        EmployeeController::class, 'search'
    ]);

    // pdf routes data
    Route::any('/employeeSheet/{id}', [EmployeeController::class, 'print_pdf_employee_data'])->name('employeeSheet');
    Route::any('/employeeList', [EmployeeController::class, 'print_pdf_employee_list'])->name('employeeList');
});


// employee routes
Route::get('/employeeLogin', function () {
    return view('authentication.employeeLogin');
});

Route::post('/loginEmployee', [AuthenticationController::class, 'login_employee']);

Route::middleware('authEmployee')->group(function () {
    // employee logout
    Route::delete('/logoutEmployee', [AuthenticationController::class, 'logout_employee']);

    // employee details
    Route::get('/details', [UserController::class, 'employee_details'])->name('details');

    // edit employee
    Route::get('/update', [UserController::class, 'edit_user_employee'])->name('update');

    Route::any('/dataSheet/{id}', [UserController::class, 'print_pdf_employee_data'])->name('dataSheet');

    // update employee details route
    Route::any('/update_details/{id}', [UserController::class, 'update'])->name('update_details');
});