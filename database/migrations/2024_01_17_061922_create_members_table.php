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
            $table->string('member_name');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('member_code')->unique();
            $table->bigInteger('nis')->nullable();
            $table->bigInteger('nisn')->nullable();
            $table->bigInteger('whatsapp');
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
