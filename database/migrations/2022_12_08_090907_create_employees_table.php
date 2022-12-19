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
            $table->integer('id', 7);
            $table->char('id_number', 16)->nullable()->unique();
            $table->char('lead_id', 1)->default('B');
            $table->char('user_id', 8)->index();
            $table->char('family_number', 16)->nullable();
            $table->char('tax_number', 20)->nullable();
            $table->string('name')->nullable();
            $table->char('gender_id', 1)->default(1)->index();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->char('department_id', 8)->nullable()->index();
            $table->date('join_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->integer('salary')->nullable();
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
            $table->foreignId('religion_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->foreignId('blood_type_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->string('last_education')->nullable();
            $table->string('picture')->nullable();
            $table->string('marital_status')->nullable();
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->nullable();    
            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnUpdate();
        });

        \DB::statement('ALTER TABLE employees CHANGE id id INT(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

        \DB::table('employees')->insert([
            [
                'lead_id' => 'A',
                'user_id' => \App\Models\User::all()->pluck('id')->first(),
                'name' => \App\Models\User::all()->pluck('name')->first(),
                'username' => 'admin',
                'department_id' => 'ITD00001',
                'join_date' => now(),
                'expire_date' => now()->addDays(365),
                'email' => \App\Models\User::all()->pluck('email')->first(),
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
