<?php

use Illuminate\Database\Seeder;

class medicamentoTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicamentos')->insert([
            'categoria' => 'Anemia',
            'medicamento' => 'Alfaepoetina 4000ui',
            'aplicacao1' => 'Aplicar 4000UI 3x por semana',
            'aplicacao2' => 'Aplicar 4000UI 2x por semana',
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
