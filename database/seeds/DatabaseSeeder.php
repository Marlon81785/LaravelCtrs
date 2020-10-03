<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(anamineseTableSeeders::class);
        $this->call(cidTableSeeders::class);
        $this->call(medicamentoTableSeeders::class);
        $this->call(medicoTableSeeders::class);
        $this->call(pacientTableSeeders::class);
        $this->call(lmeSeeder::class);
    }
}
