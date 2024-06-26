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
        Schema::create('queries', function (Blueprint $table) {
            $table->comment('Таблица запросов');
            $table->integer('id', true)->comment('Идентификатор запроса, первичный ключ, автоинкремент');
            $table->integer('user_id')->index('user_id')->comment('Внешний ключ на таблицу пользователей');
            $table->integer('lawyer_id')->nullable()->index('lawyer_id')->comment('Внешний ключ на таблицу юристов, может быть пустым');
            $table->integer('admin_id')->index('admin_id')->comment('Внешний ключ на таблицу администраторов');
            $table->text('query_text')->comment('Текст запроса');
            $table->enum('status', ['pending', 'resolved', 'closed'])->nullable()->default('pending')->comment('Статус запроса: в ожидании, решен, закрыт');
            $table->timestamp('created_at')->nullable()->useCurrent()->comment('Временная метка создания записи');
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent()->comment('Временная метка обновления записи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};

