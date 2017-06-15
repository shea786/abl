<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'user_id' => 2,
                'created_at' => '2017-06-05 00:37:27',
                'updated_at' => '2017-06-05 00:37:27',
            ),
            1 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => '2017-06-05 00:37:32',
                'updated_at' => '2017-06-05 00:37:32',
            ),
        ));
        
        
    }
}