<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            'title'=> 'The after dinner',
            'description'=> 'just a blog article\'s description by di...',
            'extrait'=> 'It was a bright night, filled with starts and the moon, full, shining over her head like a diadem ...'
        ]);
    }
}
