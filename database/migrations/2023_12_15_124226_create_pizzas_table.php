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
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id('User');
            $table->string('HawaiiList');
            $table->string('FunghiList');
            $table->string('MargheritaList');
            $table->string('MarinaList');
            $table->string('QFormaggiList');
            $table->string('Totaalprijs');
            $table->string('BOA');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizzas');
    }
};
