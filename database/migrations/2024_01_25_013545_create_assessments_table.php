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
            $table->id('id_assessment');
            $table->unsignedBigInteger('members_id');
            $table->foreign('members_id')->references('id_member')->on('members');
            $table->unsignedBigInteger('criterias_id');
            $table->foreign('criterias_id')->references('id_criteria')->on('criterias');
            $table->unsignedBigInteger('sub_criterias_id');
            $table->foreign('sub_criterias_id')->references('id_sub_criteria')->on('sub_criterias');
            $table->string('criteria_name', 20);
            $table->string('category', 20);
            $table->string('sub_criteria_name', 20);
            $table->integer('sub_criteria_value');
            $table->decimal('utility_value', 10, 2)->nullable();
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
