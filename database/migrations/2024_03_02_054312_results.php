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
        Schema::create('results', function (Blueprint $table) {
            $table->id('id_result');
            $table->unsignedBigInteger('id_member');
            $table->foreign('id_member')->references('id_member')->on('members');
            $table->string('member_name', 50);
            $table->string('member_code');
            $table->string('member_class');
            $table->decimal('result', 10, 3)->nullable();
            $table->string('period');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
