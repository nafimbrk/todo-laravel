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
        Schema::create('todo_pry', function (Blueprint $table) {
            $table->id();
            $table->string('task_pry');
            $table->boolean('is_done')->default(false);
            $table->date('due_date')->nullable(); // Menambahkan kolom due_date
            $table->foreignId('category_id')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_pry');
    }
};
