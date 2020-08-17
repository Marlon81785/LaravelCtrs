<?php

use Illuminate\Database\Seeder;

class anamineseTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anamineses')->insert([
            'tratamento' => 'hemodialise',
            'anaminese' => 'Paciente portador de IRC em programa hemodialitico convencional.',
            'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
