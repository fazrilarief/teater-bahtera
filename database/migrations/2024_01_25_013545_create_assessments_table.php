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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id')->on('members');
            $table->unsignedBigInteger('criterias_id');
            $table->foreign('criterias_id')->references('id')->on('criterias');
            $table->unsignedBigInteger('sub_criterias_id');
            $table->foreign('sub_criterias_id')->references('id')->on('sub_criterias');
            $table->string('criteria_name');
            $table->string('sub_criteria_name');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
