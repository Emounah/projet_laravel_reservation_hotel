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
        Schema::create('payment_fournisseurs', function (Blueprint $table) {
            $table->id('id_pf');
            $table->unsignedBigInteger("id_hotel");
            $table->foreign("id_hotel")
            ->references('id_hotel')
            ->on("hotels")
            ->ondelete("cascade")
            ->onUpdate("cascade");
            $table->integer('mois_paye');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_fournisseurs');
    }
};
