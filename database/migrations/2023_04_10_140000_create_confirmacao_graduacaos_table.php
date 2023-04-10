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
        Schema::create('confirmacao_graduacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('confirmacao_id');
            $table->unsignedBigInteger('graduacao_id');
            $table->timestamps();

            $table->foreign('confirmacao_id')->references('id')->on('confirmacaos')->onDelete('cascade');
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
        Schema::create('confirmacao_graduacaos', function (Blueprint $table) {
            $table->dropForeign('confirmacao_id');
            $table->dropForeign('graduacao_id');
            $table->dropColumn('confirmacao_id');
            $table->dropColumn('graduacao_id');
        });
        Schema::dropIfExists('confirmacao_graduacaos');
    }
};
