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
        Schema::create('t__c__c_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('curso_id');
            $table->string('cobranca');
            $table->timestamps();
            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('t__c__c_s', function (Blueprint $table) {
            $table->dropForeign('t__c__c_s_estudante_id_foreign');
            $table->dropForeign('t__c__c_s_user_id_foreign');
            $table->dropForeign('t__c__c_s_curso_id_foreign');
            $table->dropColumn('estudante_id');
            $table->dropColumn('user_id');
            $table->dropColumn('curso_id');
        });
        Schema::dropIfExists('t__c__c_s');
    }
};
