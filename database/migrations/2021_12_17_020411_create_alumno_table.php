<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on("persona")->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');
            $table->string('url_imagen')->nullable();
            $table->string('nombre_imagen')->nullable();
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
        Schema::dropIfExists('alumno');
    }
}
