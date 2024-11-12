<?php

use App\Models\Option;
use App\Models\Property;
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
        Schema::create('properties_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_options');
    }
};
