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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->boolean('is_active')->default(true); // Boolean for active status, default true

            $table->unsignedBigInteger('user_type_id')->nullable(); 
            $table->foreign('user_type_id')->references('id')->on('user_types'); 

            $table->unsignedBigInteger('person_id'); 
            $table->foreign('person_id')->references('id')->on('persons'); 

            $table->unsignedBigInteger('role_id'); 
            $table->foreign('role_id')->references('id')->on('roles'); 

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
