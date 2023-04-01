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
        Schema::create('confirmacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('graduacao_id');
            $table->timestamps();

            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('graduacao_id')->references('id')->on('graduacaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('confirmacaos', function (Blueprint $table) {
            $table->dropForeign('confirmacaos_estudante_id_foreign');
            $table->dropForeign('confirmacaos_user_id_foreign');
            $table->dropForeign('confirmacaos_curso_id_foreign');
            $table->dropForeign('confirmacaos_graduacao_id_foreign');
            $table->dropColumn('estudante_id');
            $table->dropColumn('user_id');
            $table->dropColumn('curso_id');
            $table->dropColumn('graduacao_id');
        });
        Schema::dropIfExists('confirmacaos');
    }
};
