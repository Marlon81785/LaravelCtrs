<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lme', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario');//paciente
            $table->string('cid');
            $table->string('medicamento1');
            $table->string('dosagem1');
            $table->string('medicamento2')->nullable();
            $table->string('dosagem2')->nullable();
            $table->string('medico');
            $table->string('posologia')->nullable();
            $table->integer('quantidade')->nullable();
            $table->date('inicial');
            $table->date('final');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('lme');
    }
}
