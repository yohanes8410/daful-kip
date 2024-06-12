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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->string('send_to');
            $table->text('message');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('send_time');
            $table->timestamp('next_send_time')->nullable();
            $table->timestamps();
        });
    }

    /**            $table->timestamp('next_send_time')->nullable();
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
