<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table("users")->([
        //     'email' => Str::random(10) . '@example.com',
        //     'username' => Str::random(10),
        //     'password' => Hash::make('password'),
        // ]);
    }
}
