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
        Schema::create('workers_ex_order_types', function (Blueprint $table) {
            $table->integer('worker_id')->unsigned();
            $table->integer('order_type_id')->unsigned();
            $table->primary(['worker_id', 'order_type_id']);
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('order_type_id')->references('id')->on('order_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers_ex_order_types');
    }
};
