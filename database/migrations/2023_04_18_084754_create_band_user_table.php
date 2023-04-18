<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandUserTable extends Migration
{
    public function up()
    {
        Schema::create('band_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('band_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            // Define foreign key constraints
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Add unique constraint to prevent duplicate entries
            $table->unique(['band_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('band_user');
    }
}

