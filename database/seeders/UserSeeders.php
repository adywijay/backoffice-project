<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'              => "Test@Super-Admin",
                'email'             => "super_djarum@gmail.com",
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'role'              => "super_admin",
                'password'          => Hash::make('Ok12345678'),
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'name'              => "Test@Admin",
                'email'             => "admin@gmail.com",
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'role'              => "admin",
                'password'          => Hash::make('Mainbola'),
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ],
            [
                'name'              => "Test@Employe",
                'email'             => "employe@gmail.com",
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'role'              => "employe",
                'password'          => Hash::make('Maintenis'),
                'created_at'        => Carbon::now()->toDateTimeString(),
                'updated_at'        => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
