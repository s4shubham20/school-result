<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ResultController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false]);
Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function () {
   Route::resource('dashboard', AdminController::class);
   Route::resource('student', StudentController::class);
   Route::resource('subject', SubjectController::class);
   Route::resource('result', ResultController::class);
   Route::get('view/result/{id}', [PDFController::class, 'generatePDF'])->name('print.result');
   Route::get('/student/fee/view',[StudentController::class, 'getFee'])->name('student.fee.view');
   Route::get('/student/fee/view/{id}',[StudentController::class, 'studentFeeDetails'])->name('student.fee.view.each');
   Route::post('/fee/student',[StudentController::class, 'feePayment'])->name('student.fee');
   Route::get('student/fee/receipt/{id}', [PDFController::class, 'generateFeeReceipt'])->name('print.fee.receipt');
   Route::get('fee/delete/{id}', [StudentController::class, 'feeDelete'])->name('fee.delete');
   Route::get('student/transfer-certificate/{id}', [StudentController::class, 'getTransferCertificate'])->name('student.certificate');
   Route::post('student/transfer-certificate', [StudentController::class, 'setTransferCertificate'])->name('student.certificate.store');
   Route::get('student/transfer-certificate/view/{id}', [PDFController::class, 'generateTransferCertifcate'])->name('student.certificate.view');
});
