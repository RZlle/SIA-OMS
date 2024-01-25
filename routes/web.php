<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\StudentAttendanceController;
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
// -----------------------------------------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::get('/student/login', function () {
    return view('auth.studentLogin');
})->name('student-login');

//ojt adviser
Route::get('ojt-adviser/login', function () {
    return view('auth.ojtAdviserLogin');
})->name('ojt-adviser-login');

//ojt-coordinator pages
Route::get('ojt-coordinator/login', function () {
    return view('auth.ojtCoordinatorLogin');
})->name('ojt-coordinator-login');

// -----------------------------------------------------------------------------------------------------------------------


Route::get('ojt-coordinator/dashboard', function () {
    return view('ojt-coordinator.ojt-coordinator-dashboard');
})->name('ojt-coordinator');

// -----------------------------------------------------------------------------------------------------------------------

Route::get('program-adviser/dashboard', function () {
    return view('program-adviser.program-adviser-dashboard');
})->name('program-adviser');

Route::get('program-adviser/requirements', [RequirementsController::class, 'RequirementsInfoRetrieve'])->name('program-adviser-requirements');

Route::get('program-adviser/requirements/add', function () {
    return view('program-adviser.add-program-req');
})->name('add-program-req');

Route::post('program-adviser/requirements/add', [RequirementsController::class, 'RequirementsInfoInput'])->name('reqInput');



Route::get('program-adviser/student/program', [StudentController::class, 'studentInfoRetrieve'])->name('programStud');
// -----------------------------------------------------------------------------------------------------------------------

Route::get('ojt-coordinator/companies', [CompanyController::class, 'index'])->name('ojt-coordinator-companies');

Route::get('ojt-coordinator/companies/view/{id}', [CompanyController::class, 'showSpecific'])->name('ojt-coorindator-view-company');

Route::get('ojt-coordinator/companies/add', function () {
    return view('ojt-coordinator.add-company');
})->name('ojt-coordinator-add-company');

Route::get('ojt-coordinator/companies/edit/{id}', [CompanyController::class, 'showSpecificForEdit'])->name('ojt-coordinator-edit-company');


//student pages
Route::get('student/dashboard', function () {
    return view('student.dashboard');
})->name('studentDashboard');


Route::get('student/daily-task', function () {
    return view('student.dailytask');
})->name('dailyTask');

Route::get('student/daily-task/{id}',[TaskController::class, 'TaskInfoShow'])->name('daily-task-specific');

Route::get('student/daily-task/id', function () {
    return view('student.view-task');
})->name('dailyTaskSpecific');

Route::get('student/ojt-requirements', function () {
    return view('student.ojt-requirements');
})->name('ojtRequirements');



 /*-------------------------------------------------------------------------------------------------------------------*/
Route::resource('student/daily-task', TaskController::class); //for file

Route::get('student/daily-task', [TaskController::class, 'TaskInfoRetrieve'])->name('taskShow');

Route::get('/download/{file}', [TaskController::class, 'downloadAttachment']);

Route::get('/student/daily-task/edit/{id}', [TaskController::class, 'TaskShowForEdit'])->name('editTask');

Route::post('student/daily-task', [TaskController::class, 'TaskInfoInput'])->name('taskInput');

Route::delete('student/daily-task/tasks/{id}', [TaskController::class, 'TaskInfoSoftDelete'])->name('tasks.soft-delete');

Route::get('student/attendance', [StudentAttendanceController::class, 'AttendShow'])->name('attendShow');
Route::post('student/attendance', [StudentAttendanceController::class, 'AttendInput'])->name('attendInput');

        // Route::get('student/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
//-------------------------------------------------------------------------------------------------------------------------------

Route::post('company/add', [CompanyController::class, 'createCompany'])->name('createCompany');
// ------------------------------------------------------------------------------------------------------------------------------------







