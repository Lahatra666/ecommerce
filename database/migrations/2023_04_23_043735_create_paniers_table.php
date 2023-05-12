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
            $table->id('idpanier');
            $table->unsignedBigInteger('idproduit');
            $table->foreign('idproduit')->references('idproduit')->on('produits');
            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('iduser')->on('users');
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
