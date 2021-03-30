<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\TestTable;

class testseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){

            // DB::table('test_tables')->insert([
            //     'name'=>$faker->name,
            //     'lastname'=>$faker->lastname
            // ]);
            TestTable :: create([
                'name'=>$faker->name,
                'lastname'=>$faker->lastname
            ]);
        }
    }
}
