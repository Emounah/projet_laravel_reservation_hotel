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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id('id_panier');
            $table->string('nom_client');
            $table->integer('n_chambre');
            $table->integer('prix');
            $table->unsignedBigInteger("id_reservation");
            $table->foreign("id_reservation")
            ->references('id_reservation')
            ->on("reservations")
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
        Schema::dropIfExists('paniers');
    }
};
