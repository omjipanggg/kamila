<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHigherEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('higher_educations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('province_id')->cascadeOnUpdate()->constrained();
            $table->year('founded_year')->nullable();
            $table->char('index_string')->nullable();
            $table->char('school_type', 3)->nullable();
            $table->foreignId('city_type_id')->cascadeOnUpdate()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('higher_educations');
    }
}
