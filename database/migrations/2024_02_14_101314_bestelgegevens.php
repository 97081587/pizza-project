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
        Schema::create('bestelgegevens', function (Blueprint $table) {
            $table->id();
            $table->string('Adres');
            $table->string('Postcode');
            $table->string('Plaats');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('bestelgegevens' , function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bestelgegevens');
    }
};
