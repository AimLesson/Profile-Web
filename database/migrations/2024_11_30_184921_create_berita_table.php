<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->index(); // Index for better search performance
            $table->string('deskripsi')->nullable(); // Short description
            $table->text('konten'); // Main content
            $table->string('gambar')->nullable(); // Path to the image
            $table->string('author')->index(); // Index for filtering by author
            $table->date('tanggal'); // Publication date
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
        Schema::dropIfExists('berita');
    }
}
