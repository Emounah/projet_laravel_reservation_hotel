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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('id_hotel');
            $table->string('nom_hotel');
            $table->string('adresse_hotel');
            $table->string('ville');
            $table->string('nbr_chambre');
            $table->text('photo');
            $table->text('description');
            $table->string('contact');
            $table->integer('nbr_etoil');
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")
            ->references('id_user')
            ->on("users")
            ->ondelete("cascade")
            ->onUpdate("cascade");
            $table->string('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
