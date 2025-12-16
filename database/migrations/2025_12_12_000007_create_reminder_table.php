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
            $table->id('reminder_id');
            $table->unsignedBigInteger('appointment_id');
            $table->dateTime('reminder_datetime');
            $table->enum('reminder_type', ['email', 'sms', 'notification']);
            $table->enum('status', ['pending', 'sent', 'failed']);
            $table->timestamps();

            // Foreign key
            $table->foreign('appointment_id')->references('appointment_id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
