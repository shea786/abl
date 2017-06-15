<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'mbamber1986',
                'first_name' => 'Martin',
                'last_name' => 'Bamber',
                'email' => 'martin_bamber@hotmail.co.uk',
                'password' => '$2y$10$P4DjkrOLX/IL5KVk6zLx9emVa5DZ30GU/1GzPHRcInlEl97PHc6D6',
                'remember_token' => 'BZeEmC7J5fLRVvIi50Oj3ZJMZryJcSXeozHM1jSJMUq57U8DsDYptteHoUrh',
                'status' => 1,
                'moderated_at' => '2017-06-11 15:08:36',
                'moderated_by' => 1,
                'created_at' => '2017-06-03 23:15:01',
                'updated_at' => '2017-06-11 15:55:36',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'shea786',
                'first_name' => 'Asif',
                'last_name' => 'Ali',
                'email' => 'shea786@live.co.uk',
                'password' => '$2y$10$iOqb6429xYvdI5aZBNOIBu7fBArUaFnW07bzMwcDGk/W.KDuzi59q',
                'remember_token' => 'Th414kupZqc8ovEb2FFzZHuU1xQyHM2RSqQ6VD7EGJ6kh0t0z1tMfYKOlFui',
                'status' => 1,
                'moderated_at' => '2017-06-11 15:19:03',
                'moderated_by' => 1,
                'created_at' => '2017-06-03 23:15:02',
                'updated_at' => '2017-06-11 15:24:58',
            ),
        ));
        
        
    }
}