<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->cascadeOnUpdate()->constrained();
            $table->foreignId('education_id')->cascadeOnUpdate()->constrained();
            $table->foreignId('education_field_id')->cascadeOnUpdate()->constrained();
            $table->foreignId('higher_education_id')->cascadeOnUpdate()->constrained();
            $table->foreignId('city_id')->cascadeOnUpdate()->constrained();
            $table->year('graduation_year');
            $table->unsignedDecimal('cgpa');
            $table->string('certificate')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('last_educations');
    }
}
