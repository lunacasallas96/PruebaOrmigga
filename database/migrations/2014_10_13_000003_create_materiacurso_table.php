<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriacursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiacurso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_materia')->unsigned();
            $table->foreign('id_materia')
                ->references('id')
                ->on('materia')
                ->onDelete('cascade');
            $table->bigInteger('id_curso')->unsigned();
            $table->foreign('id_curso')
                ->references('id')
                ->on('curso')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiacurso');
    }
}
