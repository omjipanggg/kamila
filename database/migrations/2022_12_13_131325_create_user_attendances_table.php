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
            $table->integer('attendance_id')->unsigned();
            $table->foreignUuid('user_id')->cascadeOnUpdate()->constrained();
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
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
