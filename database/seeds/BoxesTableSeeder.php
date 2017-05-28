<?php

use Illuminate\Database\Seeder;

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('boxes')->delete();

        $boxes = array(
            ['id' => '1', 'name' => 'DIV1 cardio hemato', 'number' => 410, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'name' => 'ATB PO', 'number' => 411, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        );

        // Uncomment the below to run the seeder
        DB::table('boxes')->insert($boxes);
    }
}
