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
            $table->string('usuario');
            $table->string('medicamento');
            $table->string('medico');
            $table->string('dosagem');
            $table->string('posologia');
            $table->integer('quantidade')->nullable();
            $table->date('inicial');
            $table->date('final');
            $table->string('status');
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
