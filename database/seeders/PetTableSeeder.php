<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet')->insert(array(
            [
                'name' => 'ไซบีเรียน',
                'type_id' => 1,              
            ],

            [
                'name' => 'สก็อตติส',
                'type_id' => 2,  
            ],

            [
                'name' => 'อเมริกัน ช็อตแฮร์',
                'type_id' => 2,  
            ],
        ));
           

    }
}
