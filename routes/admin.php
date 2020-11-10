<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

/* Admin Panel Routes */

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {

	//User Home page.
	Route::get('/index', 'Admin\AdminController@index')->name('admin-index');

	//User management Route.
	Route::get('/user-management', 'Admin\AdminController@usermanagement_index')->name('user-management');

	//User Resource Controller
	Route::resource('users', 'Admin\UserController');

	//Role Resource Controller
	Route::resource('roles', 'Admin\RoleController');

	//Permission Resource Controller
	Route::post('/assign-permission', 'Admin\PermissionController@assign_permission_post')->name('assign-permission-post');

	Route::post('/assign-permission-del', 'Admin\PermissionController@assign_permission_del')->name('assign-permission-del');

	Route::resource('permissions', 'Admin\PermissionController');

	/* Activity Log Routes */

	Route::get('/activity-log', 'Admin\AdminController@activitylog_index')->name('activitylog_index');

	/* Todo List Routes */
	//Todo custom update
	Route::post('/todos_update', 'Admin\TodoController@todos_update')->name('todos_update');

	//Todo custom delete
	Route::post('/todos_delete', 'Admin\TodoController@todos_delete')->name('todos_delete');

	//Task done undone, change status
	Route::post('/task_status', 'Admin\TodoController@task_status')->name('task_status');

	//Task sorting
	Route::post('/task_sort', 'Admin\TodoController@task_sort')->name('task_sort');

	/*Todo Resource*/
	Route::resource('todos', 'Admin\TodoController');

	/* Pages resource */
	Route::resource('pages', 'Admin\PageController');

	/* Analytics Route */
	Route::get('analytics', 'Admin\AnalyticsController@analytics')->name('analytics');

	//Load Admin Subject page
	Route::get('/subjects', 'admin\SubjectController@index')->name('subject_admin');

	//Edit subject-data
	Route::post('/edit-subj-data', 'admin\SubjectController@edit_subj_data')->name('edit_subj_data');
	Route::post('/edit-grade-data', 'admin\SubjectController@edit_grade_data')->name('edit_grade_data');

	//Edit-add data admin subject
	Route::post('/add-edit-subjectdata', 'admin\SubjectController@subject_submit')->name('subject_submit');
	Route::post('/add-edit-gradedata', 'admin\SubjectController@grade_submit')->name('grade_submit');

	//Subject delete
	Route::get('/subject-delete/{id}', 'admin\SubjectController@delete_subject')->name('delete_subject');
	Route::get('/grade-delete/{id}', 'admin\SubjectController@delete_grade')->name('delete_grade');


 Route::get('/chapters', 'admin\ChapterController@index')->name('chapters');
Route::post('/add-edit-chapterdata', 'admin\ChapterController@chapter_submit')->name('chapter_submit');
Route::post('/edit-chapter-data', 'admin\ChapterController@edit_chapter_data')->name('edit_chapter_data');
//Get grade subjects
	Route::post('/get-chapters', 'Admin\TestController@get_subject_chapters')->name('get_subject_chapters');


	//Listing Of Job Requests
	Route::get('/job-requests', 'Admin\JobController@index')->name('job_requests');
	Route::get('/manage-reviews', 'Admin\AdminController@profile_reviews')->name('profile_reviews');
	Route::get('/manage-grades', 'Admin\AdminController@profile_grades')->name('profile_grades');
	Route::get('/review-delete/{id}', 'Admin\AdminController@review_delete')->name('review_delete');

	Route::get('/accept_review/{id}/', ["as" => "accept-review","uses" => "Admin\AdminController@accept_review"]);
	Route::get('/reject_review/{id}/', ["as" => "reject-review", "uses" => "Admin\JobController@reject_review"]);


	Route::get('/job_boards', 'Admin\JobController@job_boards')->name('job_boards');
	Route::get('/job-requests-delete/{id}', 'Admin\JobController@delete_job_request')->name('delete_job_request');
	Route::get('/job-boards-delete/{id}', 'Admin\JobController@delete_job_board')->name('delete_job_board');
	Route::post('/edit-job-request-data', 'Admin\JobController@edit_job_request')->name('edit_job_request');
	Route::get('/accept_job_request/{id}/', ["as" => "accept-job-request","uses" => "Admin\JobController@accept_job_request"]);

	Route::get('/accept_job_board/{id}/', ["as" => "accept_job_board","uses" => "Admin\JobController@accept_job_board"]);
	Route::get('/reject_job_request/{id}/', ["as" => "reject-job-request", "uses" => "Admin\JobController@reject_job_request"]);
	Route::get('/reject_job_board/{id}/', ["as" => "reject_job_board", "uses" => "Admin\JobController@reject_job_board"]);
	// transactions
	Route::get('transactions', 'Admin\AdminController@transactions')->name('admin_transactions');
	Route::get('withdraws', 'Admin\AdminController@withdraws')->name('admin_withdraws');
	Route::get('transaction_details/{id}', 'Admin\AdminController@transaction_detail')->name('admin_transaction_detail');


	// transactions
	Route::get('booking', 'Admin\AdminController@booking')->name('admin_booking');
	

	//Test Routes
	Route::get('/add-test', 'Admin\TestController@add_testindex')->name('admin_addtest_index');

	Route::get('/test-list', 'Admin\TestController@test_listing')->name('admin_testlist');

   
    Route::get('/payment-detection/{id}', 'admin\PayController@payment_detection')->name('payment_detection');

    Route::get('/destroy-withdraw/{id}', 'admin\PayController@destroy_withdraw')->name('destroy_withdraw');
	///Route::get('/test-delete', 'Admin\TestController@destroy_admtest')->name('admin_testdelete');

	Route::get('/test-delete/{id}','Admin\TestController@destroy_admtest')->name('test-delete');

	//Get grade subjects
	Route::post('/get-subjects', 'Admin\TestController@get_grade_subjects')->name('get_grade_subjects');

	//Post test mcq
	Route::post('/add-test', 'Admin\TestController@admin_addtest')->name('admin_addtest');

	//Career - Add Job
	Route::get('/add-job', 'Admin\JobController@admin_addjob')->name('admin_addjob');

	//Career - Save Job
	Route::post('/save-job', 'Admin\JobController@care_jobs_save')->name('care_jobs_save');

	//Career - All Jobs
	Route::get('/all-jobs', 'Admin\JobController@care_all_jobs')->name('care_all_jobs');

	//Career - Single Job
	Route::get('/career-job/{jobid}', 'Admin\JobController@career_job_detail')->name('career_job_detail');

	//Edit Single Career Job
	Route::get('/career-edit-job/{jobid}', 'Admin\JobController@career_job_editIndex')->name('career_job_editIndex');

	//Edit Single Career Job Post
	Route::post('/career-job', 'Admin\JobController@career_job_editIndex_post')->name('career_job_editIndex_post');

	//Delete Single Career Job
	Route::get('/career-job-delete/{jobid}', 'Admin\JobController@career_job_delete')->name('career_job_delete');


	//Career - All Applications
	Route::get('/job-applications', 'Admin\JobController@care_applications_jobs')->name('care_applications_jobs');

	//Single Application detail Page
	Route::get('/job-application-detail/{appid}', 'Admin\JobController@application_detail')->name('application_detail');

});

	//Admin Login Authentication
	Route::get('/admin-login', 'Admin\AuthController@login_index')->name('adminlogin_index');


	Route::post('/admin-login', 'Admin\AuthController@login_post')->name('admin_login_post');


	Route::get('downlaod_resume/{id}','Admin\JobController@get_resume')->name('get_resume');

	//Logout
	Route::get('/admin-logout', 'Admin\AuthController@logout')->name('logout');
