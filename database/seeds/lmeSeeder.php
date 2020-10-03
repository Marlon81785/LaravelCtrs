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
            'medicamento' => 'ALFAEPOETINA 4000UI',
            'medico' => 'EBERALDO SEVERIANO DOMINGOS',
            'dosagem' => 'Ataque',
            'posologia' => 'APLICAR 4000UI 3X POR SEMANA',
            'quantidade' => '12',
            'inicial' => date('2020-08-10'),
            'final' => date('2020-10-10'),
            'status' => 'Ativo',           
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
