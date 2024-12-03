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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id('cert_id');
            $table->foreignId('f_id')->references('f_id')->on('formators')->onDelete('set null');
            $table->foreignId('smnr_id')->references('smnr_id')->on('nstp_seminars')->onDelete('set null');

            $table->date('cert_CompletionDate');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
