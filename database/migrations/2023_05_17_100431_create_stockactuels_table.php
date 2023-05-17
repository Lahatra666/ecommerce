<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stockactuels', function (Blueprint $table) {
            $table->id('idstockactuel');
            $table->unsignedBigInteger('idlaptop');
            $table->foreign('idlaptop')->references('idlaptop')->on('laptops');
            $table->integer('quantite');
        });
         Illuminate\Support\Facades\DB::statement("ALTER TABLE stockactuels ADD CONSTRAINT quantite check (quantite>0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockactuels');
    }
};
