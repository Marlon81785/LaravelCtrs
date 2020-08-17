<?php

use Illuminate\Database\Seeder;

class medicoTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            'nome' => 'Eberaldo Severiano Domingos',
            'crm' => '38038',
            'cns' => '898050052304673',
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
