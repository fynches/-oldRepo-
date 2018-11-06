<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class UserTableSeeder extends Seeder {

    public function run()
    {
      Model::unguard();
			$user = ['first_name' => 'Admin','last_name' => 'Admin','email' => 'admin@mail.com','password' => bcrypt('123456'),'profile_image'=>'','email_verify_code'=>'','user_type'=>1];
			$db = DB::table('users')->insert($user);
    }

}
