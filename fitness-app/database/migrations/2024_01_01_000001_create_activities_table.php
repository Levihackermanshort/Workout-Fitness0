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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->string('activity');
            $table->string('time_spent')->nullable();
            $table->string('distance')->nullable();
            $table->integer('set_count')->default(0);
            $table->integer('reps')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

