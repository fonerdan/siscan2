<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('clinical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('animal_id')->constrained();
            $table->string('sterilized');
            $table->decimal('temp', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->integer('age')->nullable();
            $table->string('color')->nullable();
            $table->text('observation')->nullable();
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('clinical_records');
    }
};
