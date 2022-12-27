<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_scores', function (Blueprint $table) {
            $table->id();
            $table->string('test_id');
            $table->foreignId('proposal_applicant_id')->cascadeOnUpdate()->constrained();
            $table->date('scoring_date');
            
            $table->tinyInteger('intelligence_test')->nullable()->unsigned();
            $table->tinyInteger('personality_test')->nullable()->unsigned();

            $table->tinyInteger('comperhension')->default(0)->unsigned();
            $table->tinyInteger('teamwork')->default(0)->unsigned();
            $table->tinyInteger('personality')->default(0)->unsigned();
            $table->tinyInteger('work_motivation')->default(0)->unsigned();
            $table->tinyInteger('interest_in_work')->default(0)->unsigned();
            $table->tinyInteger('leadership')->default(0)->unsigned();

            $table->tinyInteger('basic_computer')->default(0)->unsigned();
            $table->tinyInteger('advanced_computer')->default(0)->unsigned();
            $table->tinyInteger('work_knowledge')->default(0)->unsigned();
            $table->tinyInteger('linguistics')->default(0)->unsigned();

            $table->tinyInteger('suitability')->nullable()->unsigned();
            $table->text('notes')->nullable();

            $table->integer('interviewer1')->unsigned();
            $table->integer('interviewer2')->unsigned();
            $table->integer('interviewer3')->unsigned();

            $table->foreign('interviewer1')->references('id')->on('employees')->nullable()->cascadeOnUpdate();
            $table->foreign('interviewer2')->references('id')->on('employees')->nullable()->cascadeOnUpdate();
            $table->foreign('interviewer3')->references('id')->on('employees')->nullable()->cascadeOnUpdate();

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
        Schema::dropIfExists('test_scores');
    }
}
