<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sedation_anesthesias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('animal_id');
            $table->string('detail');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sedation_anesthesias');
    }
};
