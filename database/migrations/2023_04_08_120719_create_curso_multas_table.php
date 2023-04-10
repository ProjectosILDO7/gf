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
        Schema::create('curso_multas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('multa_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('curso_multas', function (Blueprint $table) {
            $table->dropForeign('curso_id');
            $table->dropForeign('multa_id');
            $table->dropColumn('multa_id');
            $table->dropColumn('multa_id');
        });
        Schema::dropIfExists('curso_multas');
    }
};
