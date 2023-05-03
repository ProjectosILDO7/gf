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
        Schema::create('pag_tccs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estudante_id');
            $table->string('valor_tcc');
            $table->string('data_pagamento');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('pag_tccs', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('estudante_id');
            
            $table->dropColumn('user_id');
            $table->dropColumn('estudante_id');

        });
        Schema::dropIfExists('pag_tccs');
    }
};
