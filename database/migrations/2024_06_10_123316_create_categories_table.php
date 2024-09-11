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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_cat');
            $table->integer('nbr_cle');
            $table->integer('prix');
            $table->string('categorie');
            $table->unsignedBigInteger("id_hotel");
            $table->foreign("id_hotel")
            ->references('id_hotel')
            ->on("hotels")
            ->ondelete("cascade")
            ->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
