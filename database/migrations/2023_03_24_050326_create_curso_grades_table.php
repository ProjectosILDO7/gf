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
        Schema::create('curso_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('grade_id');
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grade_id')->references('id')->on('graduacaos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('curso_grades', function (Blueprint $table) {
            $table->dropForeign('curso_grades_curso_id_foreign');
            $table->dropForeign('curso_grades_grade_id_foreign');
            $table->dropColumn('curso_id');
            $table->dropColumn('grade_id');
        });
        Schema::dropIfExists('curso_grades');
    }
};
