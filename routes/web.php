<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\LinkageController;
use Bavix\Wallet\Models\Wallet;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Auth::user()->depositFloat(50000,[
    //     'method' => 'web',
    // ],false);
//    $query = Auth::user()
//     ->transactions()
//     ->first();
   //return Auth::user()->confirm($query);
//    return $response = Http::withToken('xmHirkfXxMLgWOx8YnIXvBqO91c7UL9ju88NFDWK')
//    ->put('https://www.quidax.com/api/v1/users/yx2zhksg', [
//     'email' => 'tomalsen2000@gmail.com',
//     'first_name' => 'Network',
//     'last_name' => 'Administrator',
//     ]);
   //return Wallet::where('meta->payload->id','l5ldoycc')->get();
    return view('dashboard');
})
->middleware(['auth', 'verified'])
->name('dashboard');

Route::get('/deposit', function () {
    return view('user.deposit.index');
})
->middleware(['auth', 'verified'])
->name('deposit');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/linkage', [LinkageController::class, 'index'])->name('linkage');
    Route::get('/linkage/ok2pay/api', [LinkageController::class, 'ok2pay_view'])->name('linkage.ok2pay_view');
    Route::get('/linkage/ok2pay/api/status', [LinkageController::class, 'linkage_status'])->name('linkage.status');
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/wallet', [WalletController::class, 'create']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::webhooks('webhook-receiving-url','quidax-webhook-events');
require __DIR__.'/auth.php';
