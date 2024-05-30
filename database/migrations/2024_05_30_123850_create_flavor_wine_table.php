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
        Schema::create('flavor_wine', function (Blueprint $table) {
            $table->unsignedBigInteger('wine_id')->nullable();

            $table->foreign('wine_id')->references('id')->on('wines')->cascadeOnDelete();


            $table->unsignedBigInteger('flavor_id')->nullable();

            $table->foreign('flavor_id')->references('id')->on('flavors')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flavor_wine');
    }
};
