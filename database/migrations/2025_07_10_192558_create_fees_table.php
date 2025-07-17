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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('Payment_mode',15);
            $table->date('From_month');
            $table->date('To_month');
            $table->integer('Amount');
            $table->string('Staff_name',120);
            $table->string('Status',10);
            $table->foreignId('Stu_id')
                  ->references('id')
                  ->on('students')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
