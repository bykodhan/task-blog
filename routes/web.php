<?php

use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login_show')->middleware('guest')->name('login');  //Sadece misafirlere giriş sayfası göster
    Route::POST('/login', 'login')->middleware('guest')->name('login'); //Sadece misafirlere giriş işlemini yap


    Route::get('/register', 'register_show')->middleware('guest')->name('register');  //Sadece misafirlere kayıt sayfası göster
    Route::POST('/register', 'register')->middleware('guest')->name('register') ; //Sadece misafirlere kayıt işlemini yap

    Route::POST('/logout', 'logout')->middleware('auth')->name('logout'); //Sadece giriş yapmış kullanıcılara çıkış işlemini yap

    Route::get('/password/reset/email', 'password_reset_email_show')->middleware('guest')->name('password.reset.email.show');  //Parola sıfırlama maili gönderme sayfasını göster

    Route::get('/password/reset/{token}', 'password_reset_check')->middleware('guest')->name('password.reset.check'); //Parola sıfırlama kontrol

    Route::POST('/password/reset/email/send', 'password_reset_email_send')->middleware('guest')->name('password.reset.email.send'); //Parola sıfırlama maili gönderme işlemini yap
    Route::POST('/password/reset/update', 'password_reset_update')->middleware('guest')->name('password.reset.update'); //Parola sıfırlama işlemini yap


});


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::controller(App\Http\Controllers\Back\IndexController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(App\Http\Controllers\Back\PostController::class)->group(function () {
        Route::get('/posts', 'index')->name('posts.index'); //Yazıları listele
        
        Route::get('/posts/create', 'create')->name('posts.create'); //Yazı oluşturma sayfasını göster

        Route::get('/posts/edit/{id}', 'edit')->name('posts.edit'); //Yazı düzenleme sayfasını göster

        Route::POST('/posts/store', 'store')->name('posts.store'); //Yazı oluşturma işlemini yap
        Route::POST('/posts/update', 'update')->name('posts.update'); //Yazı oluşturma işlemini yap
        Route::POST('/posts/destroy', 'destroy')->name('posts.destroy'); //Yazı silme işlemini yap
    });

});

Route::controller(App\Http\Controllers\Front\IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/yazi/{id}/', 'post_show')->name('post.show');
});