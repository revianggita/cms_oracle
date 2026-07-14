<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_contents', function (Blueprint $table) {

            $table->enum('status', ['aktif', 'nonaktif'])
                  ->default('aktif')
                  ->after('icon');

            $table->integer('urutan')
                  ->default(1)
                  ->after('status');

        });
    }

    public function down(): void
    {
        Schema::table('landing_contents', function (Blueprint $table) {

            $table->dropColumn([
                'status',
                'urutan'
            ]);

        });
    }
};