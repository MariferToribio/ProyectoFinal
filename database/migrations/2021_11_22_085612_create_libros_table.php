<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('editorial_id')->constrained()->onDelete('cascade');
            $table->string('titulo',100);
            $table->string('categoria',100);
            $table->string('descripcion',300);
            $table->integer('cantidad');
            $table->string('precio',8,2);
            $table->string('imagen');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
