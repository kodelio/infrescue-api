<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('categories')->delete();

        $categories = array(
            ['id' => '1', 'name' => 'Electrolyes'],
            ['id' => '2', 'name' => 'Anti pyrétique']
        );

        // Uncomment the below to run the seeder
        DB::table('categories')->insert($categories);
    }
}
