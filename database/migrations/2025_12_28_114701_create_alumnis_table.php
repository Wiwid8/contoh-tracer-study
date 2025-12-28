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
        
        Schema::create('alumnis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('fullname', 255);
            $table->string('nim', 20)->unique();
            $table->enum('gender', ['L','P']);
            $table->date('date_of_birth');
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('study_program', 100);
            $table->date('graduation_date');
            $table->string('npwp', 50)->nullable();
            $table->string('company', 255)->nullable();
            $table->text('company_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
