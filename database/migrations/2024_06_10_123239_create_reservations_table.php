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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id_reservation');
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")
            ->references('id_user')
            ->on("users")
            ->ondelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger("id_hotel");
            $table->foreign("id_hotel")
            ->references('id_hotel')
            ->on("hotels")
            ->ondelete("cascade")
            ->onUpdate("cascade");
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('nbr_chambre');
            $table->integer('prix');
            $table->integer('heure');
            $table->string('active');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
