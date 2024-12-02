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
        Schema::create('formators', function (Blueprint $table) {
            $table->id('f_id');
            $table->integer('employee_id');

            // Name
            $table->string('f_Surname');
            $table->string('f_FirstName');
            $table->string('f_MiddleName');

            $table->string('f_Sex');
            $table->date('f_Birthdate');
            $table->string('f_ContactNo');
            $table->string('f_EmailAddress');

            // Teaching Info
            $table->integer('f_TeachingYearStart');
            $table->integer('f_NSTPTeachingYearStart');
            $table->float('f_TeachingUnitCount')->nullbale();
            $table->string('f_EmploymentStatus');
            $table->enum('f_ActiveTeaching',['active','inactive']);

            $table->foreignId('component_id')->references('component_id')->on('components')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formators');
    }
};
