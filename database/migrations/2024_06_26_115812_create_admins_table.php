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
        Schema::create('admins', function (Blueprint $table) {
            $table->comment('Таблица администраторов');
            $table->integer('id', true)->comment('Идентификатор администратора, первичный ключ, автоинкремент');
            $table->string('last_name')->comment('Фамилия администратора');
            $table->string('first_name')->comment('Имя администратора');
            $table->string('middle_name')->nullable()->comment('Отчество администратора, может быть пустым');
            $table->string('phone_number', 20)->comment('Номер телефона администратора');
            $table->string('email')->unique('email')->comment('Электронная почта администратора, уникальная');
            $table->string('username')->unique('username')->comment('Логин администратора, уникальный');
            $table->string('password')->comment('Пароль администратора');
            $table->timestamp('created_at')->nullable()->useCurrent()->comment('Временная метка создания записи');
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent()->comment('Временная метка обновления записи');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
