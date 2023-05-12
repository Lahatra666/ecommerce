<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.-t  
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('idstock');
            $table->unsignedBigInteger('idproduit');
            $table->foreign('idproduit')->references('idproduit')->on('produits');
            $table->integer('quantite');
            $table->string('unite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
