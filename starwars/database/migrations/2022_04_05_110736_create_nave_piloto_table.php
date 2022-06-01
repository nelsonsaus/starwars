<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavePilotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nave_piloto', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('nave_id');
            $table->ForeignId('piloto_id');
            $table->timestamps();
            //nos creamos las foreign
            $table->foreign('nave_id')
                ->references('id')
                ->on('naves')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('piloto_id')
                ->references('id')
                ->on('pilotos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nave_piloto');
    }
}
