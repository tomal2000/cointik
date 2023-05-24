<?php

use App\Http\Controllers\BeneficiaryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\User\LinkageController;
use App\Models\WalletType;
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

// Route::get('/dashboard', function () {

//     // Auth::user()->depositFloat(8000,[
//     //     'method' => 'web',
//     // ],true);
//     //$wallet = Auth::user()->getWallet('system');
//    //return Auth::user()->transactions()->where('confirmed',0)->count();
// //    $query = Auth::user()
// //     ->transactions()
// //     ->first();
//    //return Auth::user()->confirm($query);
// //    return $response = Http::withToken('xmHirkfXxMLgWOx8YnIXvBqO91c7UL9ju88NFDWK')
// //    ->get('https://www.quidax.com/api/v1/users/63migtcn/wallets/btc');
// //    return $response = Http::withToken('xmHirkfXxMLgWOx8YnIXvBqO91c7UL9ju88NFDWK')
// //    ->post('https://www.quidax.com/api/v1/users/63migtcn/withdraws', [
// //     'currency' => 'btc',
// //     'amount' => '0.0001',
// //     'fund_uid' => 'ewfhwfnn',
// //     'transaction_note' => 'Test',
// //     'narration' => 'Lol',
// //     ]);
//    //return Wallet::where('meta->payload->id','l5ldoycc')->get();

//     return view('dashboard');
// })->middleware(['auth', 'verified','complete'])->name('dashboard');

// Route::get('/deposit', function () {
//     return view('user.deposit.index');
// })
// ->middleware(['auth', 'verified'])
// ->name('deposit');

Route::middleware(['auth','verified','complete'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/deposit', function () {
       return view('user.deposit.index');
    })->name('deposit');
    Route::get('/linkage', [LinkageController::class, 'index'])->name('linkage');
    Route::get('/linkage/ok2pay/api', [LinkageController::class, 'ok2pay_view'])->name('linkage.ok2pay_view');
    Route::get('/linkage/ok2pay/api/status', [LinkageController::class, 'linkage_status'])->name('linkage.status');
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/wallet', [WalletController::class, 'create']);
    Route::get('/send', [TransferController::class, 'index'])->name('send');
    Route::post('/send', [TransferController::class, 'initiate']);
    Route::post('/beneficiary', [BeneficiaryController::class, 'create'])->name('beneficiary');
    Route::get('/beneficiary/{wallet_id}', [BeneficiaryController::class, 'userWalletBeneficiaries'])->name('beneficiary.get_by_wallet_id');
    Route::get('/withdraw/fee/{currency_id}', [TransferController::class, 'get_fee_by_currency'])->name('beneficiary.get_fee_by_currency');

    Route::get('/trade', [TradeController::class, 'index'])->name('trade');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::webhooks('webhook-receiving-url','quidax-webhook-events');
require __DIR__.'/auth.php';
