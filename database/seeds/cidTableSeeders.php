<?php

use Illuminate\Database\Seeder;

class cidTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cid')->insert([
            'cid' => 'N18.0',
            'desc' => 'DOENCA REANAL EM ESTADIO FINAL',
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
