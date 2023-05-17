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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id('idlaptop');
            $table->string('nomlaptop')->unique();
            $table->integer('prix');
            $table->string('reference')->unique();
            $table->unsignedBigInteger('idmarque');
            $table->foreign('idmarque')->references('idmarque')->on('marques');
            $table->unsignedBigInteger('idprocesseur');
            $table->foreign('idprocesseur')->references('idprocesseur')->on('processeurs');
            $table->integer('ram');
            $table->integer('dur');
            $table->mediumText('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
