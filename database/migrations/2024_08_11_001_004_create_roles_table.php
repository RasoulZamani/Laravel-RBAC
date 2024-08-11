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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the role
            $table->text('description')->nullable(); // Description of the role, nullable
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            $table->softDeletes(); // Adds 'deleted_at' for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
