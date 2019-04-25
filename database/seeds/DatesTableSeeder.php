<?php

use Illuminate\Database\Seeder;

class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dates')->insert([
        	'date'=>'Saturday'

        ]);

         DB::table('dates')->insert([
        	'date'=>'Sunday'

        ]);

          DB::table('dates')->insert([
        	'date'=>'Monday'

        ]);

           DB::table('dates')->insert([
        	'date'=>'Tuesday'

        ]);

            DB::table('dates')->insert([
        	'date'=>'Wednesday'

        ]);


            DB::table('dates')->insert([
            	'date'=>'Thursday'

            ]);

             DB::table('dates')->insert([
        	'date'=>'Friday'

        ]);

           
    }
}
