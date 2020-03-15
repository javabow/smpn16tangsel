<?php

use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});
Route::get('/set-lang/{lang}', 'LangController@lang');


Route::get('/kata-sambutan', function () {
    return view('kata-sambutan');
});

Route::get('/berita-terbaru', function () {
    return view('berita-terbaru');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', function() {
  return redirect('/');
});

// Route::get('/admin/', function() {
//   return view('admin.dashboard');
// });
// Route::get('/admin/dashboard', function() {
//   return view('admin.dashboard');
// });
// Route::get('/admin/categories', function() {
//   return view('admin.categories');
// });
// Route::get('/admin/tags', function() {
//   return view('admin.tags');
// });
// administration page
Route::group( ['middleware' => 'checkuserrole'], function()
{
  // Routes admin
  Route::get('/admin', 'Admin\DashboardController@index')->name('admin');
  Route::get('/admin/dashboard', 'Admin\DashboardController@index');
  // Route::get('/home', 'Admin\DashboardController@index');

  Route::resource('/admin/users', 'Admin\UsersController');

  Route::resource('/admin/posts', 'Admin\PostsController');
  Route::post('/admin/posts/edit-save-draft/{id}', 'Admin\PostsController@updateSaveDraft');
  Route::post('/admin/posts/edit-publish/{id}', 'Admin\PostsController@update');
  Route::post('/admin/posts/edit-status/{id}', 'Admin\PostsController@updateStatus');
  Route::post('/admin/posts/create-post', 'Admin\PostsController@createPost');

  // Route::post('/admin/posts/{post}/edit', 'Admin\PostsController@edit');
  Route::resource('/admin/contacts', 'Admin\ContactsController');
  Route::resource('/admin/categories', 'Admin\CategoriesController');
  Route::post('/admin/inline-update-categories/{id}', 'Admin\CategoriesController@inlineUpdate');
  Route::post('/admin/inline-destroy-categories/{id}', 'Admin\CategoriesController@inlineDelete');
  Route::post('/admin/categories/add', 'Admin\CategoriesController@add');
  Route::resource('/admin/tags', 'Admin\TagsController');
  Route::post('/admin/inline-update-tags/{id}', 'Admin\TagsController@inlineUpdate');
  Route::post('/admin/inline-destroy-tags/{id}', 'Admin\TagsController@inlineDelete');
  Route::get('/admin/file-manager', 'Admin\FileManagerController@index');
  Route::get('/admin/dashboard/edit-sticky-note', 'Admin\DashboardController@editStickyNote');
  Route::patch('/admin/dashboard/update-sticky-note', 'Admin\DashboardController@updateStickyNote');

  Route::resource('/admin/sejarah', 'Admin\SejarahController');
  Route::resource('/admin/kata-sambutan', 'Admin\KataSambutanController');
  Route::resource('/admin/visi-misi', 'Admin\VisiMisiController');

  Route::resource('/admin/tenaga-pendidik', 'Admin\TenagaPendidikController');
  Route::resource('/admin/tenaga-kependidikan', 'Admin\TenagaKependidikanController');
  Route::resource('/admin/alumni', 'Admin\AlumniController');
});

Route::group(['middleware' => ['auth', '\UniSharp\LaravelFilemanager\Middlewares\MultiUser', '\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder']], function() {
  // lfm
  Route::get('laravel-filemanager/show-post-thumbnail', 'Lfm\LfmController@show');
  Route::match(['get', 'post', 'put', 'patch', 'delete', 'options'], 'laravel-filemanager/upload-post-thumbnail', 'Lfm\UploadController@upload');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
