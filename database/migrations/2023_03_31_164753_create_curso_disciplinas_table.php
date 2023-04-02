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
        Schema::create('curso_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->timestamps();
            
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::create('curso_disciplinas', function (Blueprint $table) {
            $table->dropForeign('curso_disciplinas_curso_id_foreign');
            $table->dropForeign('curso_disciplinas_disciplina_id_foreign');
            $table->dropColumn('curso_id');
            $table->dropColumn('disciplina_id');
        });
        Schema::dropIfExists('curso_disciplinas');
    }
};
