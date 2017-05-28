<?php

use Illuminate\Database\Seeder;

class BatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('batches')->delete();

        $batches = array(
            ['id' => '1', 'dosage' => 'amp 1mg/1ml', 'DLU' => '01/03/12', 'drug_id' => 1, 'box_id' => 1, 'quantity' => 100, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'dosage' => 'amp 5mg/5ml', 'DLU' => '01/09/12', 'drug_id' => 1, 'box_id' => 1, 'quantity' => 50, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '3', 'dosage' => 'inj 500mg/5ml', 'DLU' => '30/11/12', 'drug_id' => 2, 'box_id' => 1, 'quantity' => 80, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '4', 'dosage' => 'amp 1mg/ml', 'DLU' => '01/10/12', 'drug_id' => 3, 'box_id' => 1, 'quantity' => 100, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '5', 'dosage' => 'amp 1mg/ml', 'DLU' => '01/08/12', 'drug_id' => 3, 'box_id' => 1, 'quantity' => 80, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        );

        // Uncomment the below to run the seeder
        DB::table('batches')->insert($batches);
    }
}
