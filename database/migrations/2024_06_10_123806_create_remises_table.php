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
        Schema::create('remises', function (Blueprint $table) {
            $table->id('id_remise');
            $table->integer('remise');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->unsignedBigInteger("id_cat");
            $table->foreign("id_cat")
            ->references('id_cat')
            ->on("categories")
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
        Schema::dropIfExists('remises');
    }
};
