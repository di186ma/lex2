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
        Schema::table('query_assignments', function (Blueprint $table) {
            $table->foreign(['query_id'], 'query_assignments_ibfk_1')->references(['id'])->on('queries')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['admin_id'], 'query_assignments_ibfk_2')->references(['id'])->on('admins')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['lawyer_id'], 'query_assignments_ibfk_3')->references(['id'])->on('lawyers')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('query_assignments', function (Blueprint $table) {
            $table->dropForeign('query_assignments_ibfk_1');
            $table->dropForeign('query_assignments_ibfk_2');
            $table->dropForeign('query_assignments_ibfk_3');
        });
    }
};
