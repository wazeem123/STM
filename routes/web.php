<?php

Route::group(['middleware' => ['web']], function() {
    

    // welcome page root    
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Auth::routes();
    
    
    Route::group(['middleware' => 'AuthenticateMiddleware'],function(){
    

Route::get('/', function () {
    $data = App\Timetable :: all();
    return view('index') -> with('timetables',$data);
});

// Route::get('/index', function () {
//     $data = App\Timetable :: all();
//     return view('index') -> with('timetables',$data);
// });
//Route::get('/index','GradeController@grade')->name('index');


Route::get('/', 'viewController@show');
Route::get('/dashboard', 'viewController@show')->name('dashboard');
Route::post('/viewTimetable',['uses' => 'viewController@update','as'=>'updateIndex']);


Route::resource('grade','GradeController');
Route::resource('group','GroupController');
Route::resource('teacherSubject','TeacherSubjectController');// folder name and controller name

Route::resource('groupSubject','GroupSubjectController');
Route::resource('period','PeriodController');
Route::resource('subject','SubjectController');
Route::resource('teacher','TeacherController');
Route::resource('timetable','TimetableController');
Route::resource('gradeSubject','GradeSubjectController');
//Route::get('/attendance','AttendanceController@edit');

Route::get('/markpresent/{id}','AttendanceController@updatePresent')->name('present');
Route::get('/markabsent/{id}', 'AttendanceController@updateAbsent')->name('absent');

Route::get('/attendance', function () {
    $data = App\Attendance :: all() ;
    $data1 = App\Teacher :: all() ;
        return view('attendances.index') -> with('teachers',$data) -> with('teach',$data1);
})->name('attendance');


Route::get('/relief', function () {
    $data = App\Relief :: all() ;
    $data1 = App\Attendance :: all() ;
        return view('relief') -> with('reliefs',$data) -> with('attendences',$data1);
    })->name('relief');

Route::get( 'subTeacher','TimetableController@teacherAjax')->name('subTeacher');

Route::get('/addNewUser','AddNewController@create');
Route::post('/addNewUser/store','AddNewController@store');
Route::resource('/addNewUser','AddNewController');
    

});
});