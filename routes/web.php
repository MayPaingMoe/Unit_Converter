<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\convertController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/convert', [convertController::class,'convert'])->name('convert');

Route::get('/{type}',fn($type)=>view('welcome',['type'=>$type]))->where('type','length|weight|temperature')->name('converter.show');

Route::get('/', fn() => view('welcome', ['type' => 'length']));

/* Route::get('/{type}', function ($type) {
    return view('index', ['type' => $type]);
})->where('type', 'length|weight|temperature')
  ->name('converter.show'); */