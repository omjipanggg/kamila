<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratedContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_applicant_id')->cascadeOnUpdate()->constrained();
            $table->char('contract_id')->unique();
            $table->char('employee_id')->unique();
            $table->integer('primary_salary')->unsigned();
            $table->integer('secondary_salary')->unsigned();
            $table->foreignId('work_location_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->date('join_date');
            $table->date('expire_date');
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
        Schema::dropIfExists('generated_contracts');
    }
}
