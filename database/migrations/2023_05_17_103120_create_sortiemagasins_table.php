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
        Schema::create('sortiemagasins', function (Blueprint $table) {
            $table->id('idsortiemagasin');
            $table->unsignedBigInteger('idlaptop');
            $table->foreign('idlaptop')->references('idlaptop')->on('laptops');
            $table->integer('quantite');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        Illuminate\Support\Facades\DB::statement("ALTER TABLE sortiemagasins ADD CONSTRAINT quantite check (quantite>0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sortiemagasins');
    }
};
