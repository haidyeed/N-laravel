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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name', 255)->index();
            $table->string('unit_number', 255)->index();
            $table->string('project', 255)->index();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('area', 10, 2);
            $table->integer('floor');
            $table->boolean('is_available')->default(true);
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
