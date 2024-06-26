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
        Schema::table('chats', function (Blueprint $table) {
            $table->foreign(['query_id'], 'chats_ibfk_1')->references(['id'])->on('queries')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'chats_ibfk_2')->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['lawyer_id'], 'chats_ibfk_3')->references(['id'])->on('lawyers')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['admin_id'], 'chats_ibfk_4')->references(['id'])->on('admins')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign('chats_ibfk_1');
            $table->dropForeign('chats_ibfk_2');
            $table->dropForeign('chats_ibfk_3');
            $table->dropForeign('chats_ibfk_4');
        });
    }
};
