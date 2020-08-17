<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCadastroPacient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomePaciente');
            $table->string('nomeMaePaciente');
            $table->string('tratamento');
            $table->string('cpf');
            $table->string('cns');
            $table->date('dataNasc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
