<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipepaket_id');
            $table->unsignedBigInteger('satuan_id');
            $table->string('namepaket')->unique();
            $table->string('harga');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('nama_pakets');
    }
}
