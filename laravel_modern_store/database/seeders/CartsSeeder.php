<?php

namespace Database\Seeders;

use App\Models\Carts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Carts::factory()->count(15)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
