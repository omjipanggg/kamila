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
            $table->increments('id', 4);
            $table->string('name');
            $table->time('on_duty');
            $table->time('off_duty');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        \DB::statement('ALTER TABLE attendances CHANGE id id INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

        \DB::table('attendances')->insert([
            [
                'name' => 'Office Hour I (07:00 - 16:00)',
                'on_duty' => '07:00',
                'off_duty' => '17:00',
                'description' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Office Hour II (08:00 - 17:00)',
                'on_duty' => '08:00',
                'off_duty' => '17:00',
                'description' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Shift I (07:00 - 13:00)',
                'on_duty' => '07:00',
                'off_duty' => '14:00',
                'description' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Shift II (14:00 - 20:00)',
                'on_duty' => '14:00',
                'off_duty' => '20:00',
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
