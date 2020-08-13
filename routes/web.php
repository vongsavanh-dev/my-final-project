<?php

use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\UserController;
use App\Models\Teacher;

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

Route::get('/', function () {
    $teacher = Teacher::all();
    return view('welcome')
        ->with('teacher', $teacher);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'Admin'])->group(function () {
    /* usercontrol */
    Route::get('users', 'UserController@index')->name('users.index');
    /* usercontrol */
    Route::post('users/{user}/MakeAdmin', 'UserController@MakeAdmin')->name('users.MakeAdmin');
});

/* route user */

Route::middleware(['auth'])->group(function () {
    Route::resource('admin', 'AdminController');
    Route::resource('subject', 'SubjectController');
    Route::get('/searchsubject', 'SubjectController@searchsubject');
    Route::get('/subjectpdf', 'SubjectController@reportsubject')->name('subjectreport');
    Route::resource('user', 'ManageUserController');
    Route::resource('teacher', 'TeacherController');
    /* สะแดงข้อมุนเมือง */
    Route::Post('teacher/create', 'TeacherController@fetch')->name('dropdown.fetch');
    Route::get('/search', 'TeacherController@search');
    Route::get('/teacherpdf', 'TeacherController@reportteacher')->name('teacherreport');
    Route::resource('major', 'MajorController');
    Route::get('/searchmajor', 'MajorController@searchmajor');
    Route::get('/majorpdf', 'MajorController@pdfreportmajor')->name('pdfmajor');
    Route::resource('category', 'CategoryController');
    Route::get('/searchcategory', 'CategoryController@searchcategory');
    Route::resource('academic', 'AcademicController');
    Route::get('/searchacademic', 'AcademicController@searchacademic');
    Route::resource('year', 'YearController');
    Route::get('/searchyear', 'YearController@searchyear');
    Route::resource('session', 'SessionController');
    /* Route::resource('student', 'StudentController'); */




    /*  import excel */

    Route::get('/score/import/', 'ImportExcelController@show');
    Route::post('/score/import', 'ImportExcelController@store');
});



/* Route::resource('studentregister', 'RegisterController');
Route::get('/search', 'RegisterController@search')->name('search'); */

Route::resource('secondregister', 'RegisterController');
Route::post('secondregister/create', 'RegisterController@create');
Route::get('/searchregister', 'RegisterController@searchregister')->name('searchregister');


Route::resource('student', 'StudentController');
Route::Post('student/create', 'StudentController@fetch')->name('dropdown.fetch');
Route::get('report/{register_id}', 'StudentController@report')->name('studentreport');
Route::get('reportstudent', 'StudentController@reportamountstudent')->name('amountreport');

# Bill-No
Route::get('preview-info-student/{id}', 'StudentController@PreviewInfoStudent')->name('preview.info.student');



Route::resource('classroom', 'ClassRoomController');




















Route::resource('post', 'PostController');






Route::resource('tag', 'TagController');



/* fontend route */

Route::get('/activity', 'ActivityController@index')->name('activity');


/* fontend route */

/* ส่งpost ไปสะแดงเวลาคิก */
Route::get('/blog/posts/{post}', [PostController::class, 'show'])->name('blog.show');

/* ส่งpost ไปสะแดงเวลาคิก */


/* สะแดงข้อมุนเวลาคิกเลือกปะเพด */
Route::get('/blog/category/{category}', [PostController::class, 'showcategory'])->name('blog.category');
/* สะแดงข้อมุนเวลาคิกเลือกปะเพด */

/* สะแดงข้อมุนเวลาคิกเลือก Tag */
Route::get('/blog/tag/{tag}', [PostController::class, 'showtag'])->name('blog.tag');
    /* สะแดงข้อมุนเวลาคิกเลือก Tag  */
