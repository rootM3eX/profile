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

Route::get('/', function () {
    return view('master');
});

/**Route::get('create-admin', function(){
    \DB::table('users')->insert([
        'name'=>'admin',
        'role'=>1,
        'email'=>'admin@web.com',
        'password'=>bcrypt('admin123')
    ]);
});

 * 
 */

Route::get('exit', function(){
    \Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
    //Search
    Route::get('/search','Dashboard\Porto_controller@search');
    //Porto
    Route::get('porto/add','Dashboard\Porto_controller@index');
    Route::post('porto/data','Dashboard\Porto_controller@store');
    Route::get('porto/show','Dashboard\Porto_controller@show');

    Route::get('porto/edit/{id}','Dashboard\Porto_controller@edit');
    Route::put('porto/update/{id}','Dashboard\Porto_controller@update');
    Route::get('porto/hapus/{id}','Dashboard\Porto_controller@delete');
    Route::get('porto/detail/{id}','Dashboard\Porto_controller@detail');

    //category
    Route::get('category/add','Dashboard\Category_controller@index');
    Route::post('category/data','Dashboard\Category_controller@store');
    Route::get('category/show','Dashboard\Category_controller@show');

    Route::get('category/edit/{id}','Dashboard\Category_controller@edit');
    Route::put('category/update/{id}','Dashboard\Category_controller@update');
    Route::get('category/hapus/{id}','Dashboard\Category_controller@delete');

    //post
    Route::get('post/add','Dashboard\Post_controller@index');
    Route::post('post/data','Dashboard\Post_controller@store');
    Route::get('post/show','Dashboard\Post_controller@show');
    Route::get('thumbnail','Dashboard\Post_controller@thumbnail');

    Route::get('post/edit/{id}','Dashboard\Post_controller@edit');
    Route::put('post/update/{id}','Dashboard\Post_controller@update');
    Route::get('post/detail/{id}','Dashboard\Post_controller@detail');
    Route::get('post/hapus/{id}','Dashboard\Post_controller@delete');

    Route::get('profile','Dashboard\Profile_controller@index');
    Route::put('profile-data/{user_id}','Dashboard\Profile_controller@update');

    //custom navbar
    Route::get('navbar/add','Dashboard\Navbar_controller@index');
    Route::post('navbar/data','Dashboard\Navbar_controller@store');
    Route::get('navbar/show','Dashboard\Navbar_controller@show');

    Route::get('navbar/edit/{id}','Dashboard\Navbar_controller@edit');
    Route::put('navbar/update/{id}','Dashboard\Navbar_controller@update');
    Route::get('navbar/hapus/{id}','Dashboard\Navbar_controller@delete');

    //custom subnav
    Route::get('navbar/sub/{id}','Dashboard\Navbar_controller@subnav');
    Route::post('subnav/data/{id}','Dashboard\Navbar_controller@subnav_store');
    Route::get('subnav/hapus/{id}','Dashboard\Navbar_controller@sub_delete');

    // Route::put('subnav/update/{id}','Dashboard\Navbar_controller@subnav_update');
});
