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
        Schema::create('lawyers', function (Blueprint $table) {
            $table->comment('Таблица юристов');
            $table->integer('id', true)->comment('Идентификатор юриста, первичный ключ, автоинкремент');
            $table->string('last_name')->comment('Фамилия юриста');
            $table->string('first_name')->comment('Имя юриста');
            $table->string('middle_name')->nullable()->comment('Отчество юриста, может быть пустым');
            $table->string('phone_number', 20)->comment('Номер телефона юриста');
            $table->string('email')->unique('email')->comment('Электронная почта юриста, уникальная');
            $table->string('username')->unique('username')->comment('Логин юриста, уникальный');
            $table->string('password')->comment('Пароль юриста');
            $table->string('expertise_area')->comment('Область специализации юриста');
            $table->timestamp('created_at')->nullable()->useCurrent()->comment('Временная метка создания записи');
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent()->comment('Временная метка обновления записи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
