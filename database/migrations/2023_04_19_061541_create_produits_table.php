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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idproduit');
            $table->string('nomproduit')->unique();
            $table->unsignedBigInteger('idcategorie');
            $table->foreign('idcategorie')->references('idcategorie')->on('categories');
            $table->integer('prix');
            $table->mediumText('detail');
            $table->mediumText('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
