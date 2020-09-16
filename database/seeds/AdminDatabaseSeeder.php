<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Mahmoud Esmail',
            'email' => 'admin@admin.com',
            'password'  => bcrypt('123123aA'),
        ]);
    }
}
