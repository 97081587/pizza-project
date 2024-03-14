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
            $table->id();
            $table->string('HawaiiList');
            $table->string('FunghiList');
            $table->string('MargheritaList');
            $table->string('MarinaList');
            $table->string('QFormaggiList');
            $table->string('Totaalprijs');
            $table->date('Bdatum');
            $table->string('BOA')->default('');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('pizzas' , function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
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
