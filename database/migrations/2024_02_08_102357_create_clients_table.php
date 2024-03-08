<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->string('name');
            $table->bigInteger('ci')->unique();
            $table->string('expedition');
            $table->string('home')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->integer('phone')->unique();
            $table->integer('reference_phone')->unique()->nullable();
            $table->string('photo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
