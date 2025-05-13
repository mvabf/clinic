<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const CHARACTER_QUANTITY = 255;

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', self::CHARACTER_QUANTITY);
            $table->string('email', self::CHARACTER_QUANTITY)->unique();
            $table->string('password');
            $table->enum('type', ['patient', 'professional']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
