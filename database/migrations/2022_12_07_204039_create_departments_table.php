<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        \DB::table('departments')->insert([
            [
                'id' => 'ITD00001',
                'name' => 'IT Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ITS00002',
                'name' => 'IT Support',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ITR00003',
                'name' => 'IT R&amp;D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'FIN00001',
                'name' => 'Finance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'MAR00001',
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'LOG00001',
                'name' => 'Logistik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ADM00099',
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'DRV00023',
                'name' => 'Driver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'DRV00024',
                'name' => 'Dedicated Driver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'HRD00001',
                'name' => 'Human Resource',
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::dropIfExists('departments');
    }
}
