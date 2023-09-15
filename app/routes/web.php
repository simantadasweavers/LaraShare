<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fileController;


Route::get('/', function () {
    return view('index');
});
Route::post('/upload_file',[fileController::class,'upload']);

Route::get('/file_download/{name}/{passcode?}',[fileController::class,'process']);
Route::post('/file_passcode_validate',[fileController::class,'passCodeValid']);

// Route::get('/files/{name}/{passcode?}',[fileController::class,'process']);
