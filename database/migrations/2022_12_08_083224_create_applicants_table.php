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
            $table->uuid('id')->primary();
            $table->char('id_number', 16)->nullable()->unique();
            $table->char('tax_number', 20)->nullable()->unique();
            $table->char('healthcare_number', 16)->nullable()->unique();
            $table->char('family_number', 16)->nullable();
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
            $table->foreignId('gender_id')->default(1)->nullable()->cascadeOnUpdate()->constrained();
            $table->string('phone_number', 16)->nullable();
            $table->string('email')->unique();
            $table->char('username', 16)->nullable();
            $table->foreignId('blood_type_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->foreignId('religion_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->string('picture')->nullable();
            $table->foreignId('marital_status_id')->cascadeOnUpdate()->nullable()->constrained('marital_status');
            $table->date('registration_date')->nullable();
            $table->date('ready_to_work')->nullable();
            $table->integer('expected_salary')->nullable();
            $table->string('expected_facility')->nullable();
            $table->foreignId('recruitment_status_id')->default(1)->nullable()->cascadeOnUpdate()->constrained('recruitment_status');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \DB::table('applicants')->insert([
            [
            'id' => \Str::uuid(),
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
            'gender_id' => 4,
            'recruitment_status_id' => 1
            ],
            [
            'id' => \Str::uuid(),
            'id_number' => '3601922001920001',
            'family_number' => '3728100204100002',
            'name' => 'Randi Muhammad Jaya',
            'birth_place' => 'Bandung',
            'birth_date' => '1992-01-20',
            'address_on_id' => 'Jl. Cendrawasih No.131 RT.004/015',
            'city_on_id' => 'Surabaya',
            'province_on_id' => 'Jawa Timur',
            'zip_code_on_id' => '63101',            
            'current_address' => 'Jl. Cendrawasih No.131 RT.004/015',
            'current_city' => 'Surabaya',
            'current_province' => 'Jawa Timur',
            'current_zip_code' => '63101',
            'phone_number' => '089512859921',
            'email' => 'randi@gmail.com',
            'username' => 'randi',
            'expected_salary' => 6300000,
            'blood_type_id' => 3,
            'religion_id' => 3,
            'gender_id' => 1,
            'recruitment_status_id' => 1
            ],
            [
            'id' => \Str::uuid(),
            'id_number' => '3604400105950020',
            'family_number' => '3603302707010010',
            'name' => 'Aulia Priatmodjo',
            'birth_place' => 'Serang',
            'birth_date' => '1995-05-01',
            'address_on_id' => 'Komp. Puri Naiga, Blok.A4-01 RT.009/010',
            'city_on_id' => 'Karawang',
            'province_on_id' => 'Jawa Barat',
            'zip_code_on_id' => '12630',            
            'current_address' => 'Komp. Puri Naiga, Blok.A4-01 RT.009/010',
            'current_city' => 'Karawang',
            'current_province' => 'Jawa Barat',
            'current_zip_code' => '12630',
            'phone_number' => '081382908420',
            'email' => 'aulia@gmail.com',
            'username' => 'auliaaa',
            'expected_salary' => 5500000,
            'blood_type_id' => 2,
            'religion_id' => 3,
            'gender_id' => 4,
            'recruitment_status_id' => 1
            ]
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
