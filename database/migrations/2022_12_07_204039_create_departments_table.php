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
            $table->increments('id', 3);
            $table->char('lead_id', 3);
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        // \DB::statement('ALTER TABLE departments CHANGE id id INT(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

        \DB::table('departments')->insert([
            [
                'lead_id' => 'BND',
                'name' => 'Business and Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'TRE',
                'name' => 'Treasury',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'FIN',
                'name' => 'Finance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'MAR',
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'LOG',
                'name' => 'Logistik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'HRD',
                'name' => 'Human Resource',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'CNP',
                'name' => 'Care and Protection',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lead_id' => 'SUP',
                'name' => 'Support',
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
        Schema::dropIfExists('departments');
    }
}
