<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('naves', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->json('pilotos')->nullable();
            $table->bigInteger('precio')->nullable();
            $table->string('logo')->default('storage/img/naves/default.png');
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
        Schema::dropIfExists('naves');
    }
}
