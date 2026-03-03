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
        Schema::table('skills', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('category');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('description');
        });

        Schema::table('education', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('description');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('client_image');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'status')) {
                $table->boolean('status')->default(true)->after('is_featured');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
