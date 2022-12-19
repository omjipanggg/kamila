<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_attendances', function (Blueprint $table) {
            $table->id();
            $table->char('user_id', 8)->index();
            $table->char('attendance_id', 8)->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullable();
            $table->foreign('attendance_id')->references('id')->on('attendances')->cascadeOnUpdate()->nullable();
            $table->date('attendance_date');
            $table->string('task_done')->nullable();
            $table->time('on_duty');
            $table->text('on_image');
            $table->double('on_latitude');
            $table->double('on_longitude');
            $table->double('on_distance');
            $table->time('off_duty')->nullable();
            $table->text('off_image')->nullable();
            $table->double('off_latitude')->nullable();
            $table->double('off_longitude')->nullable();
            $table->double('off_distance')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_attendances');
    }
}
