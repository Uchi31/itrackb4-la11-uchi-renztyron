<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('category');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->string('category');
        });

        Schema::dropIfExists('categories');
    }
};