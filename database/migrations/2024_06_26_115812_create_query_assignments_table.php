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
        Schema::create('query_assignments', function (Blueprint $table) {
            $table->comment('Таблица назначений запросов');
            $table->integer('id', true)->comment('Идентификатор назначения, первичный ключ, автоинкремент');
            $table->integer('query_id')->index('query_id')->comment('Внешний ключ на таблицу запросов');
            $table->integer('admin_id')->index('admin_id')->comment('Внешний ключ на таблицу администраторов');
            $table->integer('lawyer_id')->index('lawyer_id')->comment('Внешний ключ на таблицу юристов');
            $table->timestamp('assigned_at')->nullable()->useCurrent()->comment('Временная метка назначения');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_assignments');
    }
};
