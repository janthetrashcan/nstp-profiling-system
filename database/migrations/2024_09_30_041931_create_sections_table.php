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
        Schema::create('sections', function (Blueprint $table) {
            $table->id('sec_id');
            $table->char('sec_Section');
            $table->enum('sec_Component',['cwts','lts','rotc'])->nullable(true);
            $table->integer('sec_StudentCount')->nullable();
            $table->integer('sec_Capacity')->nullable();
            $table->string('sec_BarangayAssigned')->nullable();

            $table->foreignId('f_id')->references('f_id')->on('formators')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
