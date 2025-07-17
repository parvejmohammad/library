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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('Shift_code',5)->unique();
            $table->string('Shift_name',15);
            $table->string('Entering_time',20);
            $table->string('Entering_zone',3);
            $table->string('Leaving_time',20);
            $table->string('Leaving_zone',3);
            $table->integer('Fees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
