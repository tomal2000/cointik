<?php

namespace Database\Seeders;

use App\Models\WalletType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [ ['display_name' => 'System Naira','slug' => Str::slug('System Naira'),'code' => 'ngn','logo' => 'ngn.png','is_crypto' => false],
        ['display_name' => 'Bitcoin.','slug' => Str::slug('Bitcoin'),'code' => 'btc','logo' => 'btc.png','is_crypto' => true]];
        DB::table('wallet_types')->insert($data);
    }
}
