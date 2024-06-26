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
        Schema::table('queries', function (Blueprint $table) {
            $table->foreign(['user_id'], 'queries_ibfk_1')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['lawyer_id'], 'queries_ibfk_2')->references(['id'])->on('lawyers')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['admin_id'], 'queries_ibfk_3')->references(['id'])->on('admins')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->dropForeign('queries_ibfk_1');
            $table->dropForeign('queries_ibfk_2');
            $table->dropForeign('queries_ibfk_3');
        });
    }
};
