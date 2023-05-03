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
        Schema::create('pag_uniformes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('uniforme_id');
            $table->string('data_pagamento');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('uniforme_id')->references('id')->on('uniformes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('pag_uniformes', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('estudante_id');
            $table->dropForeign('uniforme_id');
            
            $table->dropColumn('user_id');
            $table->dropColumn('estudante_id');
            $table->dropColumn('uniforme_id');

        });
        Schema::dropIfExists('pag_uniformes');
    }
};
