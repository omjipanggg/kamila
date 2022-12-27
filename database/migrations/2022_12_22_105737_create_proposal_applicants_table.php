<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->cascadeOnUpdate()->constrained();
            $table->char('applicant_id', 8)->index();
            $table->foreign('applicant_id')->references('id')->on('applicants')->cascadeOnUpdate();
            $table->string('resume')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        \DB::table('proposal_applicants')->insert([
            ['proposal_id' => 1, 'applicant_id' => 'HXMEPM8Q', 'resume' => 'resume.pdf', 'created_at' => now(), 'updated_at' => now()],
            ['proposal_id' => 2, 'applicant_id' => 'WQ7FOY3H', 'resume' => 'resume.pdf', 'created_at' => now(), 'updated_at' => now()],
            ['proposal_id' => 3, 'applicant_id' => 'P1F916AR', 'resume' => 'resume.pdf', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_applicants');
    }
}
