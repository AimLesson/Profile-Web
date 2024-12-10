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
        Schema::create('institusis', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable(); // Path to the picture
            $table->string('name'); // Institution name
            $table->string('address'); // Institution address
            $table->string('phone'); // Institution phone
            $table->timestamps(); // Created at and updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institusis');
    }
};

