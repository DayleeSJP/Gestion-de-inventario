<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('description')->nullable()->after('name');
            $table->string('icon')->default('category')->after('description');
            $table->string('color')->default('#03645c')->after('icon');
        });

        // Add 'active' as alias for 'status' if not exists
        if (!Schema::hasColumn('categories', 'active')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->boolean('active')->default(true)->after('color');
            });
        }

        // Add price/stock columns to products for the frontend
        if (!Schema::hasColumn('products', 'price')) {
            Schema::table('products', function (Blueprint $table) {
                $table->decimal('price', 10, 2)->default(0)->after('selling_price');
                $table->boolean('active')->default(true)->after('status');
                $table->string('image')->nullable()->after('image_path');
            });
        }

        // Add 'image' column to users if not exists
        if (!Schema::hasColumn('users', 'image')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('image')->nullable()->after('username');
            });
        }
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['description', 'icon', 'color', 'active']);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price', 'active', 'image']);
        });
    }
};
