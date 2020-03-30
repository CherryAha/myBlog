<?php
/*
 * @Descripttion: 
 * @version: 
 * @Author: syt
 * @Create-Date: Do not edit
 * @Update-Date: Do not edit
 */

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class articles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([ 
            'author' => str_random(10),
            'title' => str_random(10),
            'content' => str_random(10),
            'image_list' => str_random(10),
            'classify' => str_random(10),
            'tag'=> str_randowm(5)  
        ]);
    }
}
