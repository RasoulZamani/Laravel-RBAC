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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name and extension of the image file
            $table->morphs('imageable'); // Adds 'imageable_id' and 'imageable_type'
            $table->text('description')->nullable();
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            $table->softDeletes(); // Adds 'deleted_at' for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
