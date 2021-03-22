<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();
        foreach(range(1,50) as $value){
            DB::table('articles')->insert([
                'title'=>$fake->sentence(5),
                'content'=>$fake->paragraph(6)
            ]);
        }

    }
}
