<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_pago', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_pago');
            $table->decimal('total');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documento')->onDelete('cascade');
            $table->unsignedBigInteger('matricula_id');
            $table->foreign('matricula_id')->references('id')->on('matricula')->onDelete('cascade');
            // $table->unsignedBigInteger('cliente_id');
            // $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
            $table->string('documento')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('url_imagen')->nullable();
            $table->string('nombre_imagen')->nullable();
            $table->enum('estado',['ACTIVO','ANULADO'])->default('ACTIVO');
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
        Schema::dropIfExists('documento_pago');
    }
}
