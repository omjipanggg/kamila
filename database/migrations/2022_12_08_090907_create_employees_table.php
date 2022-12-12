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
            $table->uuid('id')->primary();
            $table->foreignUuid('detail_id')->cascadeOnUpdate()->nullable()->constrained('applicants');
            $table->foreignUuid('department_id')->cascadeOnUpdate()->nullable()->constrained('departments');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropForeign(['detail_id', 'department_id']);
        Schema::dropIndex(['detail_id', 'department_id']);
        Schema::dropColumn(['detail_id', 'department_id']);
        Schema::dropIfExists('employees');
    }
}
