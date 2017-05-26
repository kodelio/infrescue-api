<?php

use Illuminate\Database\Seeder;

class DcisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('dcis')->delete();

        $dcis = array(
            ['id' => '1', 'name' => 'ADRENALINE'],
            ['id' => '2', 'name' => 'LYSINE ACETYLSALICYLATE'],
            ['id' => '3', 'name' => 'ATROPINE']
        );

        // Uncomment the below to run the seeder
        DB::table('dcis')->insert($dcis);
    }
}
