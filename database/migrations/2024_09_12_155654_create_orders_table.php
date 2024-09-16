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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id', unsigned: true);
            $table->integer('partnership_id', unsigned: true);
            $table->integer('user_id', unsigned: true);
            $table->text('description');
            $table->date('date');
            $table->string('address');
            $table->float('amount', 2);
            $table->enum('status', ['Создан', 'Назначен исполнитель', 'Завершен']);
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('order_types')->cascadeOnDelete();
            $table->foreign('partnership_id')->references('id')->on('partnerships')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->index('type_id');
            $table->index('partnership_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
