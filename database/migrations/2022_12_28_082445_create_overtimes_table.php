<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->cascadeOnUpdate()->constrained();
            $table->date('overtime_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('task_done');
            $table->foreignId('manager_id')->nullable()->cascadeOnUpdate()->constrained('employees');
            $table->foreignId('supervisor_id')->nullable()->cascadeOnUpdate()->constrained('employees');
            $table->unsignedInteger('total_hour');
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
        Schema::dropIfExists('overtimes');
    }
}
