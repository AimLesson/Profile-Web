<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->index(); // Title of the agenda
            $table->string('deskripsi')->nullable(); // Short description
            $table->text('konten'); // Main content/details
            $table->string('gambar')->nullable(); // Path to the image
            $table->string('author')->index(); // Author of the agenda
            $table->date('tanggal'); // Date of the event
            $table->timestamps(); // Created at and Updated at
            $table->softDeletes(); // Optional: for soft deletion support
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
