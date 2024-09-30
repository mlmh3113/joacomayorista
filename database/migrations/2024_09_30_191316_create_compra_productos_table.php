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
        Schema::create('compra_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('producto_id');

            $table->integer('cantidad');
            $table->double('precio');

            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_productos');
    }
};
