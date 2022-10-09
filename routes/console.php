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


Artisan::command('migrate:fresh', function () {
     $this->comment('You are not allowed to do this ');
})->purpose('Savety reason');

Artisan::command('migrate:rollback', function () {
     $this->comment('You are not allowed to do this ');
})->purpose('Savety reason');

Artisan::command('migrate:reset', function () {
     $this->comment('You are not allowed to do this ');
})->purpose('Savety reason');

Artisan::command('migrate:refresh', function () {
     $this->comment('You are not allowed to do this ');
})->purpose('Savety reason');