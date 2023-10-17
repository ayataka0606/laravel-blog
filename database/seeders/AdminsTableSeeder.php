<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            "name" => config("app.admin_name"),
            "email" => config("app.admin_email"),
            "birth" => config("app.admin_birth"),
            "login_id" => config("app.admin_login_id"),
            "password" => Hash::make(config("app.admin_login_password")),
        ]);
    }
}
