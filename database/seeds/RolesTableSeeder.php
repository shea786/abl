<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'manage administration privileges',
                'created_at' => '2017-06-04 23:57:38',
                'updated_at' => '2017-06-04 23:57:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Contributor',
                'slug' => 'contributor',
                'description' => 'This is the Contributor group',
                'created_at' => '2017-06-05 19:06:29',
                'updated_at' => '2017-06-05 19:06:29',
            ),
        ));
        
        
    }
}