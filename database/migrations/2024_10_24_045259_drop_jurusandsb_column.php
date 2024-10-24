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
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('jurusan');
            $table->dropColumn('semester');
            $table->dropColumn('fakultas_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('jurusan');
            $table->integer('semester')->check('semester <= 14');
            $table->foreignId('fakultas_id')->constrained();
        });
    }
};
