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
        Schema::create('identifications', function (Blueprint $table) {
            $table->id();
            $table->text('employee_id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename')->default('N/A');

            $table->string('bloodtype')->default('O+');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identification');
    }
};
