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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('gallery_id')
                ->constrained('galleries')
                ->onDelete('cascade');
            $table->string('caption')->nullable();
            $table->string('name', 50)->nullable(false);
            $table->integer('size')->nullable(false);
            $table->string('image_path', 255)->nullable(false);
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
        Schema::dropIfExists('images');
    }
};
