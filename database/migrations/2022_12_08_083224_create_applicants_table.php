<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->char('id_number', 16)->nullable()->unique();
            $table->char('family_number', 16)->nullable();
            $table->char('tax_number', 20)->nullable();
            $table->string('name')->nullable();
            $table->char('gender_id', 1)->default(1)->index();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address_on_id')->nullable();
            $table->string('city_on_id')->nullable();
            $table->string('province_on_id')->nullable();
            $table->string('zip_code_on_id')->nullable();
            $table->string('current_address')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_province')->nullable();
            $table->char('current_zip_code', 5)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->char('username', 32)->nullable();
            $table->string('last_education')->nullable();
            $table->string('picture')->nullable();
            $table->string('marital_status')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('ready_to_work')->nullable();
            $table->integer('expected_salary')->nullable();
            $table->string('expected_facility')->nullable();
            $table->string('resume')->nullable();
            $table->char('status', 1)->default(0);
            $table->timestamps();
        });
        Schema::table('applicants', function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnUpdate();
            $table->foreignId('blood_type_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->foreignId('religion_id')->cascadeOnUpdate()->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
