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
        Schema::table('news', function (Blueprint $table) {
            // $table->string('category')->default('news')->after('slug'); // Already exists
            if (!Schema::hasColumn('news', 'category')) {
                $table->string('category')->default('news')->after('slug');
            }
            if (!Schema::hasColumn('news', 'date')) {
                $table->date('date')->nullable()->after('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Only drop if we added it, but here keep simpler logic or omit
            // $table->dropColumn(['date']); 
        });
    }
};
