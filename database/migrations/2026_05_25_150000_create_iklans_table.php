<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */

    public function up(): void
    {

        Schema::create('iklans', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | USER PEMILIK IKLAN
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('user_id');

            /*
            |--------------------------------------------------------------------------
            | DATA ROOMMATE
            |--------------------------------------------------------------------------
            */

            $table->string('judul')->nullable();

            $table->string('lokasi')->nullable();

            $table->string('harga')->nullable();

            $table->string('gambar')->nullable();

            $table->string('status')->default('active');

            /*
            |--------------------------------------------------------------------------
            | DETAIL USER
            |--------------------------------------------------------------------------
            */

            $table->string('gender')->nullable();

            $table->string('umur')->nullable();

            $table->string('pekerjaan')->nullable();

            $table->string('roommate')->nullable();

            $table->string('habit1')->nullable();

            $table->string('habit2')->nullable();

            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {

        Schema::dropIfExists('iklans');

    }

};