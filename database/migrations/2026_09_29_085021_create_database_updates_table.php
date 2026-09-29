<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('database_updates', function (Blueprint $table) {
            $table->id();
            $table->string('note')->default('migration test');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('database_updates');
    }
};
