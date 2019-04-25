<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        		"name"=>'Mr.Admin',
        		"username"=>'admin',
        		"role_id"=>1,
        		"email"=>'admin@gmail.com',
        		"password"=>bcrypt('123456')

        ]);



          DB::table('users')->insert([
        		"name"=>'Mr.Doctor',
        		"username"=>'doctor',
        		"role_id"=>2,
        		"email"=>'doctor@gmail.com',
        		"password"=>bcrypt('123456')

        ]);


            DB::table('users')->insert([
        		"name"=>'Mr.Labassistant',
        		"username"=>'labassistant',
        		"role_id"=>3,
        		"email"=>'lab@gmail.com',
        		"password"=>bcrypt('123456')

        ]);


          DB::table('users')->insert([
        		"name"=>'Mr.Receptionist',
        		"username"=>'receptionist',
        		"role_id"=>4,
        		"email"=>'reception@gmail.com',
        		"password"=>bcrypt('123456')

        ]);


          DB::table('users')->insert([
        		"name"=>'Mr.Employee',
        		"username"=>'mmployee',
        		"role_id"=>5,
        		"email"=>'employee@gmail.com',
        		"password"=>bcrypt('123456')

        ]);


    }
}


           