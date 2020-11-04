<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MvimController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\BottomController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;


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

/*Route::get('/', function () {
    return view('frontend.welcome', ['name' => '測試name']);
});*/


//Route::view('/','frontend.welcome',['namee'=>'alex']);

// 直接靜態網頁
Route::view('/', 'home');
Route::redirect('/admin', '/admin/title');

// index 是 func name
Route::prefix('admin')->group(function(){
    Route::get('/title', [TitleController::class, 'index']);
    Route::get('/ad', [AdController::class, 'index']);
    Route::get('/image', [ImageController::class, 'index']);
    Route::get('/mvim', [MvimController::class, 'index']);
    Route::get('/total', [TotalController::class, 'index']);
    Route::get('/bottom', [BottomController::class, 'index']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/menu', [MenuController::class, 'index']);
});

/*
 * 不好的方法，應該要放在 Controller 處理
 * Route::get('/admin/{module}',function ($module){
    switch ($module){
        case "title":
            return view("backend.module",['header'=>'網站標題管理','module'=>'Title']);
            break;
        case "ad":
            return view("backend.module",['header'=>'動態廣告文字管理','module'=>'Ad']);
            break;
        case "image":
            return view("backend.module",['header'=>'校園映像圖片管理','module'=>'Image']);
            break;
        case "mvim":
            return view("backend.module",['header'=>'動畫圖片管理','module'=>'Mvim']);
            break;
        case "total":
            return view("backend.module",['header'=>'進站人數管理','module'=>'Total']);
            break;
        case "bottom":
            return view("backend.module",['header'=>'頁尾版權管理','module'=>'Bottom']);
            break;
        case "news":
            return view("backend.module",['header'=>'最新消息管理','module'=>'News']);
            break;
        case "admin":
            return view("backend.module",['header'=>'管理者管理','module'=>'Admin']);
            break;
        case "menu":
            return view("backend.module",['header'=>'選單管理','module'=>'Menu']);
            break;
    }

});*/

// modals
Route::view("/modals/addTitle", "modals.base_modal", ['modal_header' => '新增網站標題']);
Route::view("/modals/addAd", "modals.base_modal", ['modal_header' => '新增動態廣告文字']);
Route::view("/modals/addImage", "modals.base_modal", ['modal_header' => '新增校園映像圖片']);












// 這一串表示當接到 user/profile 這個網址要求， route 會去呼叫 UserController 裡面的 showProfile 這個function
Route::get('user/profile', 'UserController@showProfile');

//如此一來從Client傳來的{id}就會傳給PostController的Show()來中進行處理，最後回傳資源給Client
Route::get('post/{id}', 'PostController@show');

/*
 * {name?} 代表的就是可選擇的參數，相較於前一個參數傳遞，差別在 {id} 一定要有參數傳入，
 * 而 {name?}不用，可以自己設定沒有傳入參數時的預設值
 * 所以第一種為必需參數(Required Parameters)，第二種為可選參數(Optional Parameters)
 * */
Route::get('users/{name?}', function ($name = 'Chase') {
    return 'Hello, I am ' . $name;
});


Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        //所以網址要是/admin/users才會進來這裡
    });
});

