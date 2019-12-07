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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();
// Route::get('/', function () {
//     return view('homepage');
// });
Route::get('/test-unisharp', function() {
    return view('unisharp');
});

Route::get('/', 'HomepageController@index');
Route::get('/set-lang/{lang}', 'LangController@lang');

Route::group( ['middleware' => 'checkuserrole'], function()
{
  // Routes admin
  Route::get('/admin', 'Admin\DashboardController@index')->name('admin');
  Route::get('/admin/dashboard', 'Admin\DashboardController@index');

  Route::resource('/admin/users', 'Admin\UsersController');
  Route::resource('/admin/pages', 'Admin\PagesController');
  Route::get('/admin/pages/custom/{page}', 'Admin\WebsiteTextController@edit');
  Route::patch('/admin/pages/custom/{page}', 'Admin\WebsiteTextController@update');

  Route::resource('/admin/posts', 'Admin\PostsController');
  Route::post('/admin/posts/edit-save-draft/{id}', 'Admin\PostsController@updateSaveDraft');
  Route::post('/admin/posts/edit-publish/{id}', 'Admin\PostsController@update');
  Route::post('/admin/posts/edit-status/{id}', 'Admin\PostsController@updateStatus');
  Route::post('/admin/posts/create-post', 'Admin\PostsController@createPost');

  Route::resource('/admin/tenants', 'Admin\TenantsController');
  Route::resource('/admin/promosi-tenants', 'Admin\PromosiTenantsController');

  Route::get('/blog/preview/{titleSlug}', 'BlogController@preview');
  // Route::post('/admin/posts/{post}/edit', 'Admin\PostsController@edit');
  Route::resource('/admin/comments', 'Admin\CommentsController');
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


});
Route::group( ['middleware' => 'checkpengelolaparkir'], function()
{
  // Routes pengelola parkir
  Route::get('/admin/pengelola-parkir', 'PengelolaParkir\DashboardController@index');
  Route::resource('/admin/pengelola-parkir/juru-parkir', 'PengelolaParkir\JuruParkirController');

});
Route::get('logout', function() {
  return redirect('login')->with(Auth::logout());
})->middleware('auth');

Route::post('/post-comments/comments', 'PostCommentsController@comments');
Route::post('/post-comments/delete/{id}', 'PostCommentsController@delete');

Route::group(['middleware' => ['auth', '\UniSharp\LaravelFilemanager\Middlewares\MultiUser', '\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder']], function() {
  // lfm
  Route::get('laravel-filemanager/show-post-thumbnail', 'Lfm\LfmController@show');
  Route::match(['get', 'post', 'put', 'patch', 'delete', 'options'], 'laravel-filemanager/upload-post-thumbnail', 'Lfm\UploadController@upload');
});

Route::get('login/{social}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{social}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/blog/{titleSlug}', 'BlogController@show');
Route::get('/blogs', 'BlogsController@index');
Route::get('/blogs/search', 'BlogsController@search');
Route::get('/demo', function() {
  // $password = Hash::make('admin123');
  // echo $password;
  return view('demo');
});

Route::get('viewmail', function() {
  return view('mail-subscribe', ['email'=>'jabbarujang@gmail.com']);
});
Route::get('testmail', 'MailController@testmail');
Route::post('mail/subscribe', 'MailController@subscribe');
