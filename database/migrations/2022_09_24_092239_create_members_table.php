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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('nim')->unique();
            $table->enum('gender', ['Men', 'Women']);
            $table->date('date_of_birth');
            $table->string('photo')->nullable();
            $table->string('family')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('members');
    }
};
