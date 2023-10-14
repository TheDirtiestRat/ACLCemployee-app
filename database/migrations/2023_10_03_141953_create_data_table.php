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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('maiden_name')->default('N/A');
            $table->string('civilstatus')->default('Single');
            $table->string('citizenship');
            $table->string('religion');

            $table->string('address');
            $table->integer('tin_no')->default(000000000);
            $table->integer('sss_no')->default(000000000);
            $table->integer('pagibig_no')->default(000000000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
