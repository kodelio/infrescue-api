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
            ['id' => '1', 'name' => 'ADRENALINE', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'name' => 'LYSINE ACETYLSALICYLATE', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '3', 'name' => 'ATROPINE', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        );

        // Uncomment the below to run the seeder
        DB::table('dcis')->insert($dcis);
    }
}
