<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina_prova_atrasadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prova_atrasada_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->timestamps();

            $table->foreign('prova_atrasada_id')->references('id')->on('prova_atrasadas')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('disciplina_prova_atrasadas', function (Blueprint $table) {
            $table->dropForeign('prova_atrasada_id');
            $table->dropForeign('disciplina_id');                 
            $table->dropColumn('prova_atrasada_id');                 
            $table->dropColumn('disciplina_id');                 
        });
        Schema::dropIfExists('disciplina_prova_atrasadas');
    }
};
