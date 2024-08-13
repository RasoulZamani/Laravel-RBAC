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
        Schema::create('persons', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('name'); // Name as a string
            $table->string('last_name'); // Last name as a string
            $table->string('alias_name')->nullable(); // Alias name, can be nullable
            $table->string('father_name')->nullable(); // Father name, can be nullable
            $table->string('gender'); // Gender as a string
            $table->boolean('is_legal')->default(false); // Boolean for legal persons
            $table->string('national_code')->unique(); // National code, unique
            $table->string('mobile_phone')->unique(); // Mobile phone, unique
            $table->string('email')->nullable(); // Email, can be nullable
            $table->dateTime('birth_date')->nullable(); // Birth date, can be nullable
            
            $table->unsignedBigInteger('education_level_id')->nullable(); // Foreign key for education level, nullable
            $table->foreign('education_level_id')->references('id')->on('education_levels'); 

            $table->unsignedBigInteger('image_id')->nullable();
            $table->foreign('image_id')->references('id')->on('images');
             
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            $table->softDeletes(); // Adds 'deleted_at' for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
