<?php

use App\Livewire\Admin\Users;
use App\Livewire\Authentication\Login;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',Login::class);


Route::middleware(['auth:admin', 'auth.session'])->group(function () {
    Route::get('/counter',Counter::class);
    Route::get('/dashboard',Dashboard::class);
    Route::get('/users',Users::class);
    Route::get('/logout',[Login::class,'logout']);
});

Route::get('/set-key/{value}',function($value){
    echo "Drive : ".Cache::getDefaultDriver();
    Cache::set('mvp', $value);
    //Redis::set('mvp',$value);
    echo "<br>Value has been set;";
});

Route::get('/get-key/',function(){
    //$value = Redis::get('mvp');
    $value = Cache::get('mvp');
    echo "Value is {$value}";
});

Route::get('/send-test-email', function () {
    $details = [
        'title' => 'Test Email',
        'body' => 'This is a test email sent using MailHog in Laravel.'
    ];

    // Mail::raw($details['body'], function ($message) use ($details) {
    //     $message->to('dharmesh@atyantik.com')
    //             ->subject($details['title']);
    // });
    Mail::to('dharmesh@atyantik.com')->queue(new TestEmail());

    return 'Test email sent!';
});
