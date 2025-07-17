<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\StudentController;


Route::view('/','login')->name('login');



Route::post('/loginMatch',[StudentController::class,"loginMatch"])->name("loginMatch");
Route::get('/welcome',[StudentController::class,"welcome"])->name("welcome");
Route::get('/logout',[StudentController::class,"logout"])->name("logout");
Route::get('/singleStudent',[StudentController::class,"singleStudent"])->name("singleStudent");
Route::get('/student',[StudentController::class,"student"])->name("student");
Route::post('/saveData',[StudentController::class,"saveData"])->name("saveData");
Route::get('/admin',[StudentController::class,"admin"])->name("admin");
Route::post('/Addseat',[StudentController::class,"Addseat"])->name("Addseat");
Route::post('/Addstaff',[StudentController::class,"Addstaff"])->name("Addstaff");
Route::post('/Addtiming',[StudentController::class,"Addtiming"])->name("Addtiming");
Route::get('/deletestaff/{id}',[StudentController::class,"deletestaff"])->name("deletestaff");
Route::get('/deleteshift/{id}',[StudentController::class,"deleteshift"])->name("deleteshift");
Route::post('/searchStudent',[StudentController::class,"searchStudent"])->name("searchStudent");

Route::get('/view_Modal_Data/{id}',[StudentController::class,"view_Modal_Data"])->name("view_Modal_Data");
Route::get('/update_Modal_Data/{id}',[StudentController::class,"update_Modal_Data"])->name("update_Modal_Data");
Route::get('/delete_Modal_Data/{id}',[StudentController::class,"delete_Modal_Data"])->name("delete_Modal_Data");
Route::post('/update_student_data',[StudentController::class,"update_student_data"])->name("update_student_data");
Route::get('/delete_student/{id}',[StudentController::class,"delete_student"])->name("delete_student");
Route::get('/payFees_Modal/{id}',[StudentController::class,"payFees_Modal"])->name("payFees_Modal");
Route::post('/Student_payment',[FeeController::class,"Student_payment"])->name("Student_payment");
Route::get('/Old_reciept/{id}',[FeeController::class,"Old_reciept"])->name("Old_reciept");
Route::get('/donwloadPDF/{id}',[FeeController::class,"donwloadPDF"])->name("donwloadPDF");
Route::get('/mixContent/{id}',[FeeController::class,"mixContent"])->name("mixContent");
Route::get('/sendReminder',[FeeController::class,"sendReminder"])->name("sendReminder");
Route::get('/send_Mail',[EmailController::class,"send_Mail"])->name("send_Mail");



