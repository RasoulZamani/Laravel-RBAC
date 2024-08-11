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
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('title'); // Title of the education level
            $table->text('description')->nullable(); // Description of the education level, nullable
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            $table->softDeletes(); // Adds 'deleted_at' for soft deletes

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_levels');
    }
};
