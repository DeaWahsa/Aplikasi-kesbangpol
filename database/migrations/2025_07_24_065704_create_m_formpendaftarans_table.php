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
        Schema::create('m_formpendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('number')->nullable();
            $table->string('file_upload')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('textarea')->nullable();
            $table->string('radio')->nullable();
            $table->json('checkbox')->nullable();
            $table->string('select')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_formpendaftarans');
    }
};
