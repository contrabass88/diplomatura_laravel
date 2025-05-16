<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tiket_id'); // Tiket relacionado
            $table->unsignedBigInteger('usuario_id'); // Usuario que comenta
            $table->text('comentario');
            $table->timestamps();

            $table->foreign('tiket_id')->references('id')->on('tikets')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_comentarios');
    }
}
