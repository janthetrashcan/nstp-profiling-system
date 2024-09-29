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
            $table->integer('student-id');
            $table->string('s_ProgramCode');

            // Name
            $table->string('s_Surname');
            $table->string('s_FirstName');
            $table->string('s_MiddleName');
            
            $table->string('s_Sex');
            $table->date('s_Birthdate');
            $table->string('s_ContactNo');
            $table->string('s_EmailAddress');
            
            // City Address
            $table->string('s_c_HouseNo');
            $table->string('s_c_Street');
            $table->string('s_c_Barangay');
            $table->string('s_c_City');
            $table->string('s_c_Province');

            // Provincial Address
            $table->string('s_p_HouseNo');
            $table->string('s_p_Street');
            $table->string('s_p_Barangay');
            $table->string('s_p_City');
            $table->string('s_p_Province');

            // Contact Person
            $table->string('s_ContactPersonName');
            $table->string('s_ContactPersonNo');

            $table->timestamps();
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
