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
        Schema::create('formator_seminars', function (Blueprint $table) {
            $table->id('fs_id');
            $table->foreignId('f_id')->nullable()->references('f_id')->on('formators')->onDelete('set null');
            $table->foreignId('smnr_id')->nullable()->references('smnr_id')->on('nstp_seminars')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formator_seminars');
    }
};
