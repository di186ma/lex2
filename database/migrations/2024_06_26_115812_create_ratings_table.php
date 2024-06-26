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
        Schema::create('ratings', function (Blueprint $table) {
            $table->comment('Таблица оценок');
            $table->integer('id', true)->comment('Идентификатор оценки, первичный ключ, автоинкремент');
            $table->integer('query_id')->index('query_id')->comment('Внешний ключ на таблицу запросов');
            $table->integer('user_id')->index('user_id')->comment('Внешний ключ на таблицу пользователей');
            $table->integer('lawyer_id')->index('lawyer_id')->comment('Внешний ключ на таблицу юристов');
            $table->integer('rating')->comment('Оценка, оставленная пользователем');
            $table->timestamp('created_at')->nullable()->useCurrent()->comment('Временная метка создания записи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
