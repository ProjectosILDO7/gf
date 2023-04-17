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
        Schema::create('curso_tccs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('tcc_id');
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('tcc_id')->references('id')->on('tccs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('curso_tccs', function (Blueprint $table) {
            $table->dropForeign('curso_id');
            $table->dropForeign('tcc_id');
            $table->dropColumn('curso_id');
            $table->dropColumn('tcc_id');
        });
        Schema::dropIfExists('curso_tccs');
    }
};
