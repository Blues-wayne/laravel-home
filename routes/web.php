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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//路由参数  正则约束
Route::get('/test/{id}', function ($id) {
    echo $id;
})->where('id', '[0-9]+');

Route::get('test/{slug}', function ($slug) {
    echo $slug;
})->where('slug', '[a-zA-Z]+');

Route::get('test/{id}/{slug}', function ($id, $slug) {
    echo $id . '-' . $slug;
})->where(['id'=>'[0-9]+','slug'=>'[a-z]+']);
//路由别名   链接改变 不必重写前端链接  参数 route('url',['arg1'=>'','arg2'=>'']);
Route::get('view/{id?}','ViewController@index')->name('view.index');
//资源路由
Route::resource('photos','PhotoController');

//路由群组
//避免重复定义路由 特性  //路由前缀  中间件 子域名 命名空间
Route::group(['middleware'=>'auth','prefix'=>'mid','domain'=>'','namespace'=>''],function(){
   Route::get('/my',function(){
       echo 'my-page';
   });
   Route::get('/account',function(){
       echo 'my-account';
   });
});
