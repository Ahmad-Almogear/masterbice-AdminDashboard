<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterNewUserController;
use App\Http\Controllers\Auth\LoginNewUserController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Setting;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramRegistionController;
use App\Http\Controllers\ProgramRegistrationController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** for side bar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/admin', function () {
    return view('auth.login');
});



Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });

    // Route::get('home',function()
    // {
    //     return view('home');
    // });
});

Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers\Auth'],function()
{
    // ----------------------------login ------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('change/password', 'changePassword')->name('change/password');
    });

    // ----------------------------- register -------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register','storeUser')->name('register');  
    });

    // ----------------------------- register User -------------------------//
    Route::controller(RegisterNewUserController::class)->group(function () {
        Route::get('/registerUser', 'register')->name('registerUser');
        Route::post('/registerUser','storeUser')->name('registerUser');  
    });

     // ----------------------------login User ------------------------------//
    Route::controller(LoginNewUserController::class)->group(function () {
        Route::get('/login/User', 'login')->name('login/User');
        Route::post('/login/User', 'authenticate');
        Route::get('/logout/User', 'logout')->name('logout/User');
        Route::post('change/password/User', 'changePassword')->name('change/password/User');
    });


});

Route::group(['namespace' => 'App\Http\Controllers'],function()
{
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->name('home');
        Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
        Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
        Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
    });

    // ----------------------------- user controller ---------------------//
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('list/users', 'index')->middleware('auth')->name('list/users');
        Route::post('change/password', 'changePassword')->name('change/password');
        Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
        Route::post('user/update', 'userUpdate')->name('user/update');
        Route::post('user/delete', 'userDelete')->name('user/delete');
        Route::get('get-users-data', 'getUsersData')->name('get-users-data'); /** get all data users */

    });

    // ------------------------ setting -------------------------------//
    Route::controller(Setting::class)->group(function () {
        Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
    });

    // ------------------------ student -------------------------------//
    Route::controller(StudentController::class)->group(function () {
        Route::get('student/list', 'student')->middleware('auth')->name('student/list'); // list student
        Route::get('student/grid', 'studentGrid')->middleware('auth')->name('student/grid'); // grid student
        Route::get('student/add/page', 'studentAdd')->middleware('auth')->name('student/add/page'); // page student
        Route::post('student/add/save', 'studentSave')->name('student/add/save'); // save record student
        Route::get('student/edit/{id}', 'studentEdit'); // view for edit
        Route::post('student/update', 'studentUpdate')->name('student/update'); // update record student
        Route::delete('student/delete', 'studentDelete')->name('student/delete'); // delete record student
        Route::get('student/profile/{id}', 'studentProfile')->middleware('auth'); // profile student
        Route::get('get-student-list', 'getDataList')->name('get-student-list'); // get data list

    });

    // ------------------------ teacher -------------------------------//
    Route::controller(TeacherController::class)->group(function () {
        Route::get('teacher/add/page', 'teacherAdd')->middleware('auth')->name('teacher/add/page'); // page teacher
        Route::get('teacher/list/page', 'index')->middleware('auth')->name('teacher/list/page'); // page teacher
        Route::get('teacher/grid/page', 'teacherGrid')->middleware('auth')->name('teacher/grid/page'); // page grid teacher
        Route::post('teacher/save', 'saveRecord')->middleware('auth')->name('teacher/save'); // save record
        Route::get('teacher/edit/{user_id}', 'editRecord'); // view teacher record
        Route::post('teacher/update', 'updateRecordTeacher')->middleware('auth')->name('teacher/update'); // update record
        Route::post('teacher/delete', 'teacherDelete')->name('teacher/delete'); // delete record teacher
    });

    // ----------------------- department -----------------------------//
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('department/list/page', 'departmentList')->middleware('auth')->name('department/list/page'); // department/list/page
        Route::get('department/add/page', 'indexDepartment')->middleware('auth')->name('department/add/page'); // page add department
        Route::get('department/edit/{page}', 'editDepartment')->middleware('auth')->name('department/edit/page'); // page add department
        Route::get('department/edit/{department_id}', 'editDepartment'); // page add department
        // Route::get('department/save', 'create')->middleware('auth')->name('department/save');
        // Route::post('department/save', 'saveRecord')->middleware('auth')->name('department/save'); // department/save
        Route::get('department/save', 'create')->middleware('auth')->name('department/save');
        Route::post('department/save', 'saveRecord')->middleware('auth')->name('department/save'); // department/save

        Route::post('department/update', 'updateRecord')->middleware('auth')->name('department/update'); // department/update
        Route::post('department/delete', 'deleteRecord')->middleware('auth')->name('department/delete'); // department/delete
        Route::get('get-data-list', 'getDataList')->name('get-data-list'); // get data list


    });


    // ----------------------- subject -----------------------------//
    Route::controller(SubjectController::class)->group(function () {
        Route::get('subject/list/page', 'subjectList')->middleware('auth')->name('subject/list/page'); // subject/list/page
        Route::get('subject/add/page', 'subjectAdd')->middleware('auth')->name('subject/add/page'); // subject/add/page
        Route::post('subject/save', 'saveRecord')->name('subject/save'); // subject/save
        Route::post('subject/update', 'updateRecord')->name('subject/update'); // subject/update
        Route::post('subject/delete', 'deleteRecord')->name('subject/delete'); // subject/delete
        Route::get('subject/edit/{subject_id}', 'subjectEdit'); // subject/edit/page
    });

    // ----------------------- invoice -----------------------------//
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('invoice/list/page', 'invoiceList')->middleware('auth')->name('invoice/list/page'); // subjeinvoicect/list/page
        Route::get('invoice/paid/page', 'invoicePaid')->middleware('auth')->name('invoice/paid/page'); // invoice/paid/page
        Route::get('invoice/overdue/page', 'invoiceOverdue')->middleware('auth')->name('invoice/overdue/page'); // invoice/overdue/page
        Route::get('invoice/draft/page', 'invoiceDraft')->middleware('auth')->name('invoice/draft/page'); // invoice/draft/page
        Route::get('invoice/recurring/page', 'invoiceRecurring')->middleware('auth')->name('invoice/recurring/page'); // invoice/recurring/page
        Route::get('invoice/cancelled/page', 'invoiceCancelled')->middleware('auth')->name('invoice/cancelled/page'); // invoice/cancelled/page
        Route::get('invoice/grid/page', 'invoiceGrid')->middleware('auth')->name('invoice/grid/page'); // invoice/grid/page
        Route::get('invoice/add/page', 'invoiceAdd')->middleware('auth')->name('invoice/add/page'); // invoice/add/page
        Route::post('invoice/add/save', 'saveRecord')->name('invoice/add/save'); // invoice/add/save
        Route::post('invoice/update/save', 'updateRecord')->name('invoice/update/save'); // invoice/update/save
        Route::post('invoice/delete', 'deleteRecord')->name('invoice/delete'); // invoice/delete
        Route::get('invoice/edit/{invoice_id}', 'invoiceEdit')->middleware('auth')->name('invoice/edit/page'); // invoice/edit/page
        Route::get('invoice/view/{invoice_id}', 'invoiceView')->middleware('auth')->name('invoice/view/page'); // invoice/view/page
        Route::get('invoice/settings/page', 'invoiceSettings')->middleware('auth')->name('invoice/settings/page'); // invoice/settings/page
        Route::get('invoice/settings/tax/page', 'invoiceSettingsTax')->middleware('auth')->name('invoice/settings/tax/page'); // invoice/settings/tax/page
        Route::get('invoice/settings/bank/page', 'invoiceSettingsBank')->middleware('auth')->name('invoice/settings/bank/page'); // invoice/settings/bank/page
    });

    // ----------------------- accounts ----------------------------//
    Route::controller(AccountsController::class)->group(function () {
        Route::get('account/fees/collections/page', 'index')->middleware('auth')->name('account/fees/collections/page'); // account/fees/collections/page
        Route::get('add/fees/collection/page', 'addFeesCollection')->middleware('auth')->name('add/fees/collection/page'); // add/fees/collection
        Route::post('fees/collection/save', 'saveRecord')->middleware('auth')->name('fees/collection/save'); // fees/collection/save
    });


    Route::controller(ThemeController::class)->group(function(){
        Route::get('/welcome' ,'welcome')->name('welcome');
        Route::get('/about' ,'about')->name('about');
        Route::get('/blog' ,'blog')->name('blog');
        Route::get('/footer' ,'footer')->name('footer');
        Route::get('/header' ,'header')->name('header');
        Route::get('/main_header' ,'main_header')->name('main_header');
        Route::get('/service' ,'service')->name('service');
        Route::get('/team' ,'team')->name('team');
        Route::get('/testimonial' ,'testimonial')->name('testimonial');
        Route::get('/' , 'master')->name('master');
        // Route::get('/event' , 'event')->name('event');
        Route::get('/review' , 'review')->name('review');
        Route::get('/loginTheme' , 'loginTheme')->name('loginTheme');
        // Route::get('/registerTheme' , 'registerTheme')->name('registerTheme');



        

    });
            // Route::get('/contact' ,'contact')->name('contact');
    Route::get('/contact-us', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::get('/contact-us', [ContactUsController::class, 'Title'])->name('contact_us.create');

    Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::get('/ShowMessages', [ContactUsController::class, 'index'])->name('ShowMessages');
    Route::delete('/contact-us/{id}', [ContactUsController::class, 'destroy'])->name('contactUs.destroy');
    // Route::get('/home', [ContactUsController::class, 'index'])->name('homeContact');
    Route::get('/program/add', [ProgramController::class, 'create'])->name('program/add');
    Route::post('/program/add', [ProgramController::class, 'store'])->name('program/add');
    Route::get('program/list',[ProgramController::class, 'index']) ->name('program/list'); // page teacher
    Route::get('/program' ,[ProgramController::class,'indexShow'])->name('program');
    Route::get('/RegistionProgram' ,[ProgramRegistrationController::class, 'index'])->name('RegistionProgram');
    Route::post('/program/register', [ProgramRegistrationController::class, 'register'])->name('/program/register');
    Route::get('program/edit/{id}', [ProgramController::class, 'programEdit'] )->name('program/edit'); // view for edit programEdit
    Route::post('Program/delete', [ProgramController::class, 'deleteRecord'])->name('Program/delete'); // subject/delete
    Route::delete('programs/{id}', [ProgramController::class, 'destroy'])->name('programs.destroy');





    Route::get('/event/add', [EventController::class, 'create'])->name('event/add');
    Route::post('/event/add', [EventController::class, 'store'])->name('event/add');
    Route::get('/event/list',[EventController::class, 'index']) ->name('event/list'); // page teacher  
    // Route::get('/event',[EventController::class, 'indexshow']) ->name('event');
    // Route::get('/event', [EventController::class, 'Title'])->name('eventTitle');
    Route::prefix('/event')->group(function () {
        Route::get('/', [EventController::class, 'indexshow'])->name('event');
        Route::get('/title', [EventController::class, 'Title'])->name('event.title');
    });
    Route::post('/event/register', [EventController::class, 'register'])->name('event.register');
    Route::get('/registerShow', [EventController::class, 'registerShow'])->name('registerShow');
    Route::delete('event/{id}', [EventController::class, 'destroy'])->name('event/destroy');



    Route::get('/guardians/create', [GuardianController::class, 'create'])->name('guardians/create');
    Route::post('/guardians/create', [GuardianController::class, 'store'])->name('guardians/create');
    // Route::get('', [GuardianController::class, 'create'])->name('guardians/create');

   

    Route::get('/notifications', [ContactUsController::class, 'notifications'])->name('notifications');



   









 







        

}); 