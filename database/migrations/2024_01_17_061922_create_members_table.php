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
            $table->id('id_member');
            $table->string('member_name', 50);
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('member_code', 11)->unique();
            $table->bigInteger('nis')->nullable();
            $table->bigInteger('nisn')->nullable();
            $table->bigInteger('whatsapp');
            $table->string('email')->nullable();
            $table->datetime('birthday');
            $table->integer('grade');
            $table->string('major', 50);
            $table->integer('class_code');
            $table->enum('structure', ['Anggota', 'Pengurus']);
            $table->string('interest', 50);
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
