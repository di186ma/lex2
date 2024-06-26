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
        Schema::create('chats', function (Blueprint $table) {
            $table->comment('Таблица чатов');
            $table->integer('id', true)->comment('Идентификатор сообщения в чате, первичный ключ, автоинкремент');
            $table->integer('query_id')->index('query_id')->comment('Внешний ключ на таблицу запросов');
            $table->integer('user_id')->nullable()->index('user_id')->comment('Внешний ключ на таблицу пользователей, если отправитель - пользователь');
            $table->integer('lawyer_id')->nullable()->index('lawyer_id')->comment('Внешний ключ на таблицу юристов, если отправитель - юрист');
            $table->integer('admin_id')->nullable()->index('admin_id')->comment('Внешний ключ на таблицу администраторов, если отправитель - администратор');
            $table->text('message')->comment('Текст сообщения');
            $table->timestamp('created_at')->nullable()->useCurrent()->comment('Временная метка создания записи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
