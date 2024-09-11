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
        Schema::create('employeurs', function (Blueprint $table) {
            $table->id('id_emp');
            $table->string('nom');
            $table->string('prenom');
            $table->date('ddn');
            $table->string('adresse');
            $table->string('situation');
            $table->string('contact');
            $table->string('email');
            $table->unsignedBigInteger("id_fonction");
            $table->foreign("id_fonction")
            ->references('id_fonction')
            ->on("fonctions")
            ->ondelete("cascade")
            ->onUpdate("cascade");
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
        Schema::dropIfExists('employeurs');
    }
};
