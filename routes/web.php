<?php

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


/*__________________Users Routs______________________________*/

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
Route::get('verifyemail/{id}', 'Auth\RegisterController@verifyEmail');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('rules', 'Rules@index');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset_password', 'Auth\ForgotPasswordController@reset_password');
Route::get('/checkUsername', 'Rules@checkUsername');
Route::get('/checkUserEmail', 'Rules@checkUserEmail');




Route::middleware(['user','verified'])->group(function () {
	/*__________________Front Routs______________________________*/
	Route::get('userquestion', 'QuestionUserController@index');
	Route::get('score', 'QuestionUserController@score');
	Route::get('dashboard', 'QuestionUserController@dashboard');
	Route::post('saveanswer', 'QuestionUserController@store');
	Route::get('usersearch/{id}', 'QuestionUserController@usersearch');
	Route::get('usersearchall/{id}', 'QuestionUserController@usersearchall');
	Route::get('profile', 'UserController@user_profile');
	Route::post('reset_password', 'UserController@reset_password');
	Route::get('ready-to-play', 'QuestionUserController@ready_quiz');
	Route::get('result', 'QuestionUserController@result');
	


});
// Registration Routes...
Route::get('/register', 'Auth\LoginController@showLoginForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Login user
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');




// Route::get('admin_area', ['middleware' => 'admin', function () {
Route::middleware(['admin'])->group(function () {	

Route::post('/users_add', 'UserController@create_user');
Route::resource('users', 'UserController');
Route::get('/user-create', 'UserController@user_create');
Route::get('/getusers/{id}', 'UserController@getusers');
Route::get('/email-exist', 'UserController@isEmailExist');
Route::delete('/user/{id}', 'UserController@destroy');
Route::post('/users_add', 'UserController@create_user');
Route::get('/user-edit/{squirrel}', 'UserController@edit_user');
Route::post('/update-user', 'UserController@update_user');
Route::get('/user-delete/{squirrel}', 'UserController@delete_user');
Route::get('/my-account', 'UserController@my_account');

/*__________________Category Routs______________________________*/

Route::resource('categories', 'CategoriesController');
Route::get('/category-exist', 'CategoriesController@isCategoryExist');
Route::get('/getCategory/{id}', 'CategoriesController@getCategory');
Route::post('/category-update', 'CategoriesController@update');
Route::delete('/category/{id}', 'CategoriesController@destroy');

/*__________________Level Routs______________________________*/

Route::resource('level', 'LevelController');
Route::get('/level-exist', 'LevelController@isLevelExist');
Route::get('/getlevel/{id}', 'LevelController@getLevel');
Route::post('/level-update', 'LevelController@update');
Route::delete('/level/{id}', 'LevelController@destroy');

/*__________________Question Routs______________________________*/

Route::resource('questions', 'QuestionsController');
Route::post('/question-update', 'QuestionsController@update');
Route::get('/getQuestion/{id}', 'QuestionsController@getQuestion');
Route::delete('/question/{id}', 'QuestionsController@destroy');


/*__________________Session Routs______________________________*/

Route::resource('sessions', 'SessionsController');
Route::resource('facker', 'FakerController');
Route::get('/update-session/{id}', 'SessionsController@status_update');
Route::get('/date-exist', 'SessionsController@isdateExist');


/*___________________Report Routs______________________________*/

Route::get('/reports', 'ReportsController@index');
Route::post('/reports', 'ReportsController@index');

/*___________________Rules Routs______________________________*/

Route::get('/manage-rules', 'Rules@manage_rules');
Route::post('/post_rule', 'Rules@post_rule');

});




// Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});
