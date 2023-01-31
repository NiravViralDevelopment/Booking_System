<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');





// DB_CONNECTION=mysql
// DB_HOST=127.0.0.1
// DB_PORT=3306
// DB_DATABASE=redspar6_booking_app
// DB_USERNAME=redspar6_booking_app
// DB_PASSWORD=J{w8K.zCPr$I