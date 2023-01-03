<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePaidLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_paid_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paid_leave_id')->cascadeOnUpdate()->constrained();
            $table->foreignId('employee_id')->cascadeOnUpdate()->constrained();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description');
            $table->unsignedInteger('remaining_quota')->default(12);
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
        Schema::dropIfExists('employee_paid_leaves');
    }
}
