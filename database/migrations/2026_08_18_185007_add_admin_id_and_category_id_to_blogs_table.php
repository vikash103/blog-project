<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->foreignId('admin_id')
                ->nullable()
                ->after('id')
                ->constrained('admins')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->nullable()
                ->after('admin_id')
                ->constrained('categories')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->dropForeign(['category_id']);
            $table->dropForeign(['admin_id']);

            $table->dropColumn([
                'category_id',
                'admin_id'
            ]);
        });
    }
};