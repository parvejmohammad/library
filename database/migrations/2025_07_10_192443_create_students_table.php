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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('Enrollment_id');
            $table->string('Name',70);
            $table->string('Email')->unique();
            $table->string('Contact',12);
            $table->string('Father_name',70);
            $table->string('Address',200);
            $table->string('Gender',8)->default('Female');
            $table->string('Profile_image',200)->default('student.jpg');
            $table->string('Assign_seat',10);
            $table->string('Shift_code',5);
            $table->date('Date_of_joining');
            $table->string('Staff',100);
            $table->integer('Student_fees');
            $table->string('Payed_till')->default('N/A');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
