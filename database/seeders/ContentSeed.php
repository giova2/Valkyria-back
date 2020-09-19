<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        \DB::table('contents')->insert(array(
        	'page_id'			=> 1,
            'name'              => 'body',
            'text'              => 'Valkyria BODY...',
            'visible'			=> 1

        ));

        \DB::table('contents')->insert(array(
        	'page_id'			=> 1,
            'name'              => 'title',
            'text'              => 'Title Valkyria',
        	'visible'			=> 1
        ));    

        \DB::table('contents')->insert(array(
        	'page_id'			=> 1,
            'name'              => 'foot',
            'text'              => 'Footer test',
            'visible'			=> 1
        ));    
    
    }
}
