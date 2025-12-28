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
        Schema::create('responses_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_response_id')->constrained('user_responses')->onDelete('cascade');
            $table->text('question_text');
            $table->text('answer_text')->nullable();
            $table->text('other_answer')->nullable();
            $table->text('matrix_answers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses_details');
    }
};
