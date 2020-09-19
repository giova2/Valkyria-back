<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pages')->insert(array(
            'name' => 'concept'
        ));        
	}
}
