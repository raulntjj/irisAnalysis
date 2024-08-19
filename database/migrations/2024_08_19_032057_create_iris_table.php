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
        Schema::create('iris', function (Blueprint $table) {
            $table->id();
            $table->double('sepal_length');
            $table->double('sepal_width');
            $table->double('petal_length');
            $table->double('petal_width');
            $table->string('specie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iris');
    }
};
