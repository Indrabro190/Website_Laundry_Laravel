<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NamaPaketController;
use App\Http\Controllers\TipePaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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



Route::get('/detailtransaksi', [DetailController::class, 'detailtransaksi'])->name('detailtransaksi');


Route::get('/dashboardgrafik', [TransaksiController::class, 'dashboardgrafik'])->name('dashboardgrafik');



// login
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/cek_login', [AuthController::class, 'cek_login'])->name('cek_login');
Route::get('/katasandi', [AuthController::class, 'katasandi'])->name('katasandi');

// -----------------------------forget password ------------------------------
Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('/forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword']);

// register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('registeruser');







Route::group(['middleware' => ['auth', 'checklevel:admin,pegawai']], function () {

    // Dashboard
    // Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry');
    Route::get('/dashboard', [TransaksiController::class, 'dashboard'])->name('dashboard');
    Route::get('/pemesanan', [TransaksiController::class, 'pemesanan'])->name('pemesanan');
    Route::get('/exportpdf', [TransaksiController::class, 'exportpdf'])->name('exportpdf');
    Route::post('/search', [TransaksiController::class, 'search'])->name('search');
    Route::get('/exportsearch', [TransaksiController::class, 'exportsearch'])->name('exportsearch');
    Route::get('/exportexcel', [TransaksiController::class, 'exportexcel'])->name('exportexcel');
    Route::get('/transaksiexcel', [TransaksiController::class, 'transaksiexcel'])->name('transaksiexcel');

    Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry');
    // Data Master Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::post('/transaksi/{id}/update', [TransaksiController::class, 'update']);
    Route::post('/delete-transaksi', [TransaksiController::class, 'deletetransaksi'])->name('deletetransaksi');

    // Data Master TipePaket
    Route::get('/datatipepaket', [TipePaketController::class, 'datatipepaket'])->name('datatipepaket');
    Route::get('/detailtipepaket/{id}', [TipePaketController::class, 'detailtipepaket'])->name('detailtipepaket');
    Route::get('/tampilkandatatipepaket/{id}', [TipePaketController::class, 'tampilkandatatipepaket'])->name('tampilkandatatipepaket');
    Route::post('/tipepaket/store', [TipePaketController::class, 'store']);
    Route::post('/tipepaket/{id}/update', [TipePaketController::class, 'update']);
    Route::get('/deletetipe/{id}', [TipePaketController::class, 'deletetipe']);

    // Route Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('datacustomer');
    Route::get('/datacustomer', [CustomerController::class, 'datacustomer'])->name('datacustomer');
    Route::get('/tambahcustomer', [CustomerController::class, 'tambahcustomer'])->name('tambahcustomer');
    Route::post('/customer/store', [CustomerController::class, 'store']);
    Route::post('/customer/{id}/update', [CustomerController::class, 'update']);
    Route::get('/detailcustomer/{id}', [CustomerController::class, 'detailcustomer'])->name('detailcustomer');

    // dataprofile
    Route::get('/dataprofile', [UserController::class, 'dataprofile']);
    Route::post('/dataprofile/{id}/update1', [UserController::class, 'update1']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

});


Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    // data transaksi
    Route::post('/transaksi/{id}/updatestatus', [TransaksiController::class, 'updatestatus']);
    Route::get('/delete/{id}', [TransaksiController::class, 'delete']);

    // data customer
    Route::get('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer']);

    // Data Master User
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser']);

    // Data Master NamaPaket
    Route::get('/paket', [NamaPaketController::class, 'index'])->name('datapaket');
    Route::get('/datapaket', [NamaPaketController::class, 'datapaket'])->name('datapaket');
    Route::get('/tampilkandatapaket/{id}', [NamaPaketController::class, 'tampilkandatapaket'])->name('tampilkandatapaket');
    Route::post('/paket/store', [NamaPaketController::class, 'store']);
    Route::post('/paket/{id}/update', [NamaPaketController::class, 'update']);
    Route::get('/paket/{id}/destroy', [NamaPaketController::class, 'destroy']);
    Route::get('/deletepaket/{id}', [NamaPaketController::class, 'deletepaket']);

    // Cabang
    Route::get('/datacabang', [CabangController::class, 'datacabang']);
    Route::post('/cabang/store', [CabangController::class, 'store']);
    Route::post('/cabang/{id}/update', [CabangController::class, 'update']);
    Route::get('/deletecabang/{id}', [CabangController::class, 'deletecabang']);

    // Satuan
    Route::get('/datasatuan', [SatuanController::class, 'datasatuan']);
    Route::post('/satuan/store', [SatuanController::class, 'store']);
    Route::post('/satuan/{id}/update', [SatuanController::class, 'update']);
    Route::get('/deletesatuan/{id}', [SatuanController::class, 'deletesatuan']);
});

// Register User
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/store', [RegisterController::class, 'store']);
Route::post('/register/{id}/update', [RegisterController::class, 'update']);
Route::get('/register/{id}/destroy', [RegisterController::class, 'destroy']);