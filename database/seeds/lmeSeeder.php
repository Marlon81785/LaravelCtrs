<?php

use Illuminate\Database\Seeder;

class lmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lme')->insert([
            'usuario' => '1',
            'cid' => 'N18.0',
            'medicamento1' => 'ALFAEPOETINA 4000UI',
            'dosagem1' => 'ATAQUE',
            'medicamento2' => 'SACARATO DE HIDROXIDO FERRICO',
            'dosagem2' => 'ATAQUE',
            'medico' => 'EBERALDO SEVERIANO DOMINGOS',
            'posologia' => null,
            'quantidade' => '12',
            'inicial' => date('2020-08-10'),
            'final' => date('2020-10-10'),
            'status' => 'Ativo',           
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
