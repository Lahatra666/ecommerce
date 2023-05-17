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
        Schema::create('stocksuspendumagasins', function (Blueprint $table) {
            $table->id('idstocksuspendumagasin');
            $table->unsignedBigInteger('idmagasin');
            $table->foreign('idmagasin')->references('idmagasin')->on('magasins');
            $table->unsignedBigInteger('idlaptop');
            $table->foreign('idlaptop')->references('idlaptop')->on('laptops');
            $table->integer('quantite');
            $table->integer('etat')->default(0); 
           });
         Illuminate\Support\Facades\DB::statement("ALTER TABLE stocksuspendumagasins ADD CONSTRAINT quantite check (quantite>0)");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocksuspendumagasins');
    }
};
