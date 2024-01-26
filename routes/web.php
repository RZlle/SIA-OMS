<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
Route::group(['middleware'=>['revalidate_back_history']], function() {
    Route::get('/', [AuthController::class, 'login'])->name('getLogin')->middleware('custom_guest');
    Route::post('/student-login', [AuthController::class, 'studentLoginPOST'])
        ->name('studentPostLogin')
        ->middleware('custom_guest');

    Route::post('/adviser-login', [AuthController::class, 'adviserLoginPOST'])
        ->name('adviserPostLogin')
        ->middleware('custom_guest');

    Route::post('/coordinator-login', [AuthController::class, 'coordinatorLoginPOST'])
        ->name('coordinatorPostLogin')
        ->middleware('custom_guest');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('forgot-password');

    // -----------------------------------------------------------------------------------------------------------------------

    Route::prefix('student')->group( function () {
        Route::get('/login', function () {
            return view('auth.studentLogin');
        })->name('student-login')->middleware('custom_guest');

        Route::group(['middleware'=>['custom_auth']], function() {

            Route::get('/dashboard', function () {
                return view('student.dashboard');
            })->name('studentDashboard');

            Route::get('/daily-task', function () {
                return view('student.dailytask');
            })->name('dailyTask');

            Route::get('/daily-task/id', function () {
                return view('student.view-task');
            })->name('dailyTaskSpecific');

            Route::get('/ojt-requirements', function () {
                return view('student.ojt-requirements');
            })->name('ojtRequirements');

            Route::get('/daily-task/{id}', [TaskController::class, 'TaskInfoShow'])->name('daily-task-specific');

            Route::resource('/daily-task', TaskController::class);

            Route::get('/daily-task', [TaskController::class, 'TaskInfoRetrieve'])->name('taskShow');

            Route::get('/daily-task/edit/{id}', [TaskController::class, 'TaskShowForEdit'])->name('editTask');

            Route::post('/daily-task', [TaskController::class, 'TaskInfoInput'])->name('taskInput');

            Route::delete('/daily-task/tasks/{id}', [TaskController::class, 'TaskInfoSoftDelete'])->name('tasks.soft-delete');

            Route::get('/attendance', [StudentAttendanceController::class, 'AttendShow'])->name('attendShow');
            Route::post('/attendance', [StudentAttendanceController::class, 'AttendInput'])->name('attendInput');

            Route::get('/program', [StudentController::class, 'studentInfoRetrieve'])->name('programStud');

            Route::get('/download/{file}', [TaskController::class, 'downloadAttachment']);
        });
    });

    // -----------------------------------------------------------------------------------------------------------------------

    Route::get('ojt-adviser/login', function () {
        return view('auth.ojtAdviserLogin');
    })->name('ojt-adviser-login')->middleware('custom_guest');

    Route::prefix('ojt-coordinator')->group( function () {
        //ojt-coordinator pages
        Route::get('/login', function () {
            return view('auth.ojtCoordinatorLogin');
        })->name('ojt-coordinator-login')->middleware('custom_guest');

        Route::group(['middleware'=>['custom_auth']], function() {

            Route::get('/dashboard', function () {
                return view('ojt-coordinator.ojt-coordinator-dashboard');
            })->name('ojt-coordinator');

            Route::get('/companies', [CompanyController::class, 'index'])->name('ojt-coordinator-companies');

            Route::get('/companies/view/{id}', [CompanyController::class, 'showSpecific'])->name('ojt-coorindator-view-company');

            Route::get('/companies/add', function () {
                return view('ojt-coordinator.add-company');
            })->name('ojt-coordinator-add-company');

            Route::get('/companies/edit/{id}', [CompanyController::class, 'showSpecificForEdit'])->name('ojt-coordinator-edit-company');

            Route::post('company/add', [CompanyController::class, 'createCompany'])->name('createCompany');
        });
    });

    // -----------------------------------------------------------------------------------------------------------------------

    Route::prefix('program-adviser')->group( function () {
        Route::get('/dashboard', function () {
            return view('program-adviser.program-adviser-dashboard');
        })->name('program-adviser')->middleware('custom_auth');

        Route::get('/requirements', [RequirementsController::class, 'RequirementsInfoRetrieve'])->name('program-adviser-requirements')->middleware('custom_auth');

        Route::get('/requirements/add', function () {
            return view('program-adviser.add-program-req');
        })->name('add-program-req')->middleware('custom_auth');

        Route::post('/requirements/add', [RequirementsController::class, 'RequirementsInfoInput'])->name('reqInput')->middleware('custom_auth');
    });

    // -----------------------------------------------------------------------------------------------------------------------

  

            // Route::get('student/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    //-------------------------------------------------------------------------------------------------------------------------------

    
    // ------------------------------------------------------------------------------------------------------------------------------------
});
