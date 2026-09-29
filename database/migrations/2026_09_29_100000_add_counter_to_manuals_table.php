<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('manuals', 'counter')) {
            Schema::table('manuals', function (Blueprint $table) {
                $table->unsignedInteger('counter')->default(0);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('manuals', 'counter')) {
            Schema::table('manuals', function (Blueprint $table) {
                $table->dropColumn('counter');
            });
        }
    }
};
