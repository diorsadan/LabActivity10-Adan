<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // runs first because posts need the authors table
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // Kagawad, Secretary, BHW, Tanod
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    // undo for migrate:rollback
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
