<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'テスト管理者ユーザー',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('password'),
        ]);
    }
}
