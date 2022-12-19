<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->string('name');
            $table->time('on_duty');
            $table->time('off_duty');
            $table->string('description')->nullable();
            $table->timestamps();
        });


        \DB::table('attendances')->insert([
            [
                'id' => 'ATD00001',
                'name' => 'Office Hour I (07:00 - 16:00)',
                'on_duty' => '07:00',
                'off_duty' => '17:00',
                'description' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'id' => 'ATD00002',
                'name' => 'Office Hour II (08:00 - 17:00)',
                'on_duty' => '08:00',
                'off_duty' => '17:00',
                'description' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'id' => 'ATD00003',
                'name' => 'Shift I (07:00 - 14:00)',
                'on_duty' => '07:00',
                'off_duty' => '14:00',
                'description' => NULL,
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
        Schema::dropIfExists('attendances');
    }
}
