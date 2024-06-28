<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/panel', function () {
        return view('admin_panel_empty');
    })->name('admin_panel');

    Route::get('/user/home', function () {
        return view('userHome');
    })->name('userHome');
});

Route::get('/home', [Controller::class, 'home'])->name('home');

Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/login', [Controller::class, 'loginPost'])->name('login.post');
Route::get('/registration', [Controller::class, 'registration'])->name('registration');
Route::post('/registration', [Controller::class, 'registrationPost'])->name('registration.post');
Route::get('/forgot_my_password', [Controller::class, 'forgot_my_password'])->name('forgot_my_password');
Route::post('/forgot_my_password', [Controller::class, 'forgot_my_passwordPost'])->name('forgot_my_password.post');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');

Route::get('/addUser', [Controller::class, 'addUser'])->name('addUser');
Route::post('/addUser', [Controller::class, 'addUserPost'])->name('addUser.post');
Route::get('/UserUpdate', [Controller::class, 'UpdateUser'])->name('UpdateUser');
Route::post('/UserUpdate', [Controller::class, 'UpdateUserPost'])->name('UpdateUser.post');
Route::get('/deleteUser', [Controller::class, 'deleteUser'])->name('deleteUser');
Route::post('/deleteUser', [Controller::class, 'deleteUserPost'])->name('deleteUser.post');
Route::get('/showallUsers', [Controller::class, 'showAllUsers'])->name('showAllUsers');

Route::get('/addShop', [Controller::class, 'addShop'])->name('addShop');
Route::post('/addShop', [Controller::class, 'addShopPost'])->name('addShop.post');
Route::get('/ShopUpdate', [Controller::class, 'UpdateShop'])->name('UpdateShop');
Route::post('/ShopUpdate', [Controller::class, 'UpdateShopPost'])->name('UpdateShop.post');
Route::get('/deleteShop', [Controller::class, 'deleteShop'])->name('deleteShop');
Route::post('/deleteShop', [Controller::class, 'deleteShopPost'])->name('deleteShop.post');
Route::get('/showallShops', [Controller::class, 'showAllShops'])->name('showAllShops');

Route::get('/addUpdate', [Controller::class, 'addUpdate'])->name('addUpdate');
Route::post('/addUpdate', [Controller::class, 'addUpdatePost'])->name('addUpdate.post');
Route::get('/editlastUpdate', [Controller::class, 'editLastUpdate'])->name('editLastUpdate');
Route::post('/editlastUpdate', [Controller::class, 'editLastUpdatePost'])->name('editLastUpdate.post');
Route::get('/showallUpdates', [Controller::class, 'showAllUpdates'])->name('showAllUpdates');

Route::get('/messages', [Controller::class, 'messages'])->name('messages');
Route::post('/messages', [Controller::class, 'messagesPost'])->name('messages.post');
Route::get('/chat', [Controller::class, 'messageChat'])->name('messageChat');
Route::post('/chat', [Controller::class, 'messageChatPost'])->name('messageChat.post');
Route::post('/homechat', [Controller::class, 'messageChatHomePost'])->name('messageChatHome.post');

Route::get('/usermessages', [Controller::class, 'usermessages'])->name('usermessages');
Route::post('/usermessages', [Controller::class, 'usermessagesPost'])->name('usermessages.post');
Route::get('/userchat', [Controller::class, 'usermessageChat'])->name('usermessageChat');
Route::post('/userchat', [Controller::class, 'usermessageChatPost'])->name('usermessageChat.post');
Route::get('/usershowallUpdates', [Controller::class, 'usershowAllUpdates'])->name('usershowAllUpdates');
