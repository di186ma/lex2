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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('Таблица пользователей');
            $table->integer('id', true)->comment('Идентификатор пользователя, первичный ключ, автоинкремент');
            $table->string('last_name')->comment('Фамилия пользователя');
            $table->string('first_name')->comment('Имя пользователя');
            $table->string('middle_name')->nullable()->comment('Отчество пользователя, может быть пустым');
            $table->string('phone_number', 20)->comment('Номер телефона пользователя');
            $table->string('email')->unique('email')->comment('Электронная почта пользователя, уникальная');
            $table->integer('age')->comment('Возраст пользователя');
            $table->string('username')->unique('username')->comment('Логин пользователя, уникальный');
            $table->string('password')->comment('Пароль пользователя');
            $table->timestamp('created_at')->nullable()->useCurrent()->comment('Временная метка создания записи');
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent()->comment('Временная метка обновления записи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
