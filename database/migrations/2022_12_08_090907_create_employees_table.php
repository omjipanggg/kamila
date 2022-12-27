<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            // $table->char('id_fixed', 8)->primary();
            $table->char('user_id')->index();
            $table->increments('id', 3);
            $table->char('year_id', 4)->default(date('Y'));
            $table->char('lead_id', 1)->default('B');
            $table->char('id_number', 16)->nullable()->unique();
            $table->char('family_number', 16)->nullable();
            $table->char('healthcare_number', 16)->nullable()->unique();
            $table->char('tax_number', 20)->nullable();
            $table->string('name')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('position_id')->nullable()->unsigned();
            $table->date('join_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->integer('salary')->nullable();
            $table->string('address_on_id')->nullable();
            $table->string('city_on_id')->nullable();
            $table->string('province_on_id')->nullable();
            $table->char('zip_code_on_id', 5)->nullable();
            $table->string('current_address')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_province')->nullable();
            $table->char('current_zip_code', 5)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->char('username', 32)->nullable();
            $table->foreignId('religion_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->foreignId('blood_type_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->string('last_education')->nullable();
            $table->string('picture')->nullable();
            $table->foreignId('marital_status_id')->cascadeOnUpdate()->nullable()->constrained('marital_status');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('position_id')->references('id')->on('positions')->cascadeOnUpdate();    
            $table->foreignId('gender_id')->default(1)->nullable()->cascadeOnUpdate()->constrained();
            $table->foreignId('work_location_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->timestamps();
        });

        \DB::statement('ALTER TABLE employees CHANGE id id INT(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

        \DB::table('employees')->insert([
            [
                'lead_id' => 'A',
                'year_id' => '02' . date('y'),
                'id_number' => '3604012907960049',
                'user_id' => \App\Models\User::where('name', 'Administrator')->pluck('id')->first(),
                'name' => \App\Models\User::where('name', 'Administrator')->pluck('name')->first(),
                'username' => 'admin',
                'position_id' => 1,
                'join_date' => now(),
                'expire_date' => now()->addDays(365),
                'marital_status_id' => 2,
                'email' => \App\Models\User::where('name', 'Administrator')->pluck('email')->first(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'B',
                'year_id' => '02' . date('y'),
                'id_number' => '3603300408920001',
                'user_id' => \App\Models\User::where('name', 'Mawlana Ajie Pamungkas')->pluck('id')->first(),
                'name' => \App\Models\User::where('name', 'Mawlana Ajie Pamungkas')->pluck('name')->first(),
                'username' => 'mawlana',
                'position_id' => 1,
                'join_date' => now(),
                'expire_date' => now()->addDays(365),
                'marital_status_id' => 2,
                'email' => \App\Models\User::where('name', 'Mawlana Ajie Pamungkas')->pluck('email')->first(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'A',
                'year_id' => '02' . date('y'),
                'id_number' => '3602701205940020',
                'user_id' => \App\Models\User::where('name', 'Aulia Maharani Putri')->pluck('id')->first(),
                'name' => \App\Models\User::where('name', 'Aulia Maharani Putri')->pluck('name')->first(),
                'username' => 'aulia',
                'position_id' => 1,
                'join_date' => now(),
                'expire_date' => now()->addDays(365),
                'marital_status_id' => 1,
                'email' => \App\Models\User::where('name', 'Aulia Maharani Putri')->pluck('email')->first(),
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
        Schema::dropIfExists('employees');
    }
}
