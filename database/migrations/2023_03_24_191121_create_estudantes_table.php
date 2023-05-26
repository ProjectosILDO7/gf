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
        Schema::create('estudantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('curso_id');
            //$table->unsignedBigInteger('grade_id');
            $table->string('image')->nullable();
            $table->string('nome');
            $table->string('numBI');
            $table->unsignedBigInteger('organization_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            //$table->foreign('grade_id')->references('id')->on('graduacaos')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('estudantes', function (Blueprint $table) {
            $table->dropForeign('estudantes_curso_id_foreign');
            //$table->dropForeign('estudantes_grade_id_foreign');
            $table->dropForeign('estudantes_user_id_foreign');
            //$table->dropForeign('estudantes_organization_id_foreign');
            $table->dropColumn('curso_id');
            //$table->dropColumn('grade_id');
            $table->dropColumn('user_id');
            //$table->dropColumn('organization_id');
        });
        Schema::dropIfExists('estudantes');
    }
};
