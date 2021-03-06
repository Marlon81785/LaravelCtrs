<?php

use Illuminate\Database\Seeder;

class pacientTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacient')->insert([
            'nomePaciente' => 'Jose Escolastico',
            'nomeMaePaciente' => 'Maria jose escolastico',
            'tratamento' => 'Hemodialise',
            'peso' => 72.0,
            'altura' => 175,
            'telefone' => '31 99999 9999',
            'cpf' => '99999999999',
            'cns' => '8983823276382332',
            'dataNasc' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
