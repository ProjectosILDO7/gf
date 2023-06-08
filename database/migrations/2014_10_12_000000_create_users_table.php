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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('numBI')->nullable();
            $table->string('dataValidadeBI')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('Activo');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('users', function(Blueprint $table){
            $table->dropForeign('users_departamento_id_foreign');
            $table->dropForeign('users_categoria_id_foreign');
            $table->dropColumn('departamento_id');
            $table->dropColumn('categoria_id');
        });
        Schema::dropIfExists('users');
    }
};
