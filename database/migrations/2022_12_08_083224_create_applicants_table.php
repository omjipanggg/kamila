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
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address_on_id')->nullable();
            $table->string('city_on_id')->nullable();
            $table->string('province_on_id')->nullable();
            $table->char('zip_code_on_id', 5)->nullable();
            $table->string('current_address')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_province')->nullable();
            $table->char('current_zip_code', 5)->nullable();
            $table->string('phone_number', 16)->nullable();
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
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
        Schema::table('applicants', function (Blueprint $table) {
            $table->foreignId('gender_id')->default(1)->nullable()->cascadeOnUpdate()->constrained();
            $table->foreignId('blood_type_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->foreignId('religion_id')->cascadeOnUpdate()->nullable()->constrained();
        });

        \DB::table('applicants')->insert([
            [
            'id' => substr(\Str::uuid(), 0, 8),
            'id_number' => '3604400808940013',
            'family_number' => '3603302707010010',
            'name' => 'Mira Aksara Putera',
            'birth_place' => 'Bandung',
            'birth_date' => '1994-08-08',
            'address_on_id' => 'Jl. Cempaka No.11',
            'city_on_id' => 'Magelang',
            'province_on_id' => 'Jawa Tengah',
            'zip_code_on_id' => '56126',            
            'current_address' => 'Jl. Cempaka No.11',
            'current_city' => 'Magelang',
            'current_province' => 'Jawa Tengah',
            'current_zip_code' => '56126',
            'phone_number' => '087885067737',
            'email' => 'mira_aksara@gmail.com',
            'username' => 'miraksara',
            'expected_salary' => 7200000,
            'blood_type_id' => 1,
            'religion_id' => 3,
            'gender_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
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
