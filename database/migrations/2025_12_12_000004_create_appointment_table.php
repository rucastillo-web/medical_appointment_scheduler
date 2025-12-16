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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('created_by_staff_id');
            $table->unsignedBigInteger('updated_by_staff_id')->nullable();
            $table->dateTime('appointment_datetime');
            $table->enum('status', ['scheduled', 'completed', 'cancelled', 'no-show']);
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors')->onDelete('cascade');
            $table->foreign('created_by_staff_id')->references('staff_id')->on('staff')->onDelete('cascade');
            $table->foreign('updated_by_staff_id')->references('staff_id')->on('staff')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
