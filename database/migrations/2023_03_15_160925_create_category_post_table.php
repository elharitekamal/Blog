<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            ;
            $table->unsignedBigInteger('id_post');
            $table->foreign('id_post')->references('id')->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_post');
    }
};