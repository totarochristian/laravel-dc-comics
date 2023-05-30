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
        Schema::create('comic_writers', function (Blueprint $table) {
            $table->foreignId('id_comic')->references('id')->on('comics');
            $table->foreignId('id_writer')->references('id')->on('writers');
            $table->primary(['id_comic','id_writer']);
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
        Schema::dropIfExists('comic_writers');
    }
};
