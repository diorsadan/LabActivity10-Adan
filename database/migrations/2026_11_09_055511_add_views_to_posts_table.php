<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // separate migration so we don't edit the posts migration that already ran
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // after() is ignored in sqlite, views just goes last
            $table->unsignedInteger('views')->default(0)->after('body');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
};
