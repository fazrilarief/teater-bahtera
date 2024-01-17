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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('code')->unique();
            $table->integer('nis')->nullable();
            $table->integer('nisn')->nullable();
            $table->string('whatsapp');
            $table->string('email')->nullable();
            $table->datetime('birthday');
            $table->integer('grade');
            $table->string('major');
            $table->integer('class_code');
            $table->enum('structure', ['Anggota', 'Pengurus']);
            $table->string('interest');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
