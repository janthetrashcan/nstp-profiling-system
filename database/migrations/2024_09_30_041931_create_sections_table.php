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
            $table->enum('sec_Component',['cwts','lts','rotc']);
            $table->integer('sec_StudentCount');
            $table->string('sec_BarangayAssigned');

            $table->foreignId('f_id')->constrained('formators');

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
