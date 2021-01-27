<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_rw');
            $table->foreign('id_rw')->references('id')->
                    on('rws')->onDelete('cascade');
            $table->string('positif');
            $table->string('sembuh');
            $table->string('meninggal');
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
        Schema::dropIfExists('kasuses');
    }
}
