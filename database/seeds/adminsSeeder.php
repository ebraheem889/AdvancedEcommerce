<?php

use Illuminate\Database\Seeder;

class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' =>'Ebraheem',
            'email'=>'super_admin@gmail.com',
            'password' => bcrypt(123456789)
        ]);
    }
}
