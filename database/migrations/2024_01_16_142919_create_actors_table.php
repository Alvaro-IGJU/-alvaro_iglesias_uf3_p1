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
        Schema::create('actors', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name', 30);
            $table->string('surname', 30);
            $table->date('birthdate');
            $table->string('country', 30);
            $table->string('img_url', 255);
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};