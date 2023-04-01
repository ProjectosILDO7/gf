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
        Schema::create('prova_atrasadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('cadeira_id');
            $table->timestamps();

            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cadeira_id')->references('id')->on('disciplinas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('prova_atrasadas', function (Blueprint $table) {
            $table->dropForeign('prova_atrasadas_estudante_id_foreign');
            $table->dropForeign('prova_atrasadas_user_id_foreign');
            $table->dropForeign('prova_atrasadas_cadeira_id_foreign');
            $table->dropColumn('estudante_id');
            $table->dropColumn('user_id');
            $table->dropColumn('cadeira_id');
        });
        Schema::dropIfExists('prova_atrasadas');
    }
};
