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
            $table->foreignUuid('applicant_id')->cascadeOnUpdate()->constrained();
            $table->string('resume')->nullable();
            $table->date('date_applied');
            $table->boolean('status')->default(1);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \DB::table('proposal_applicants')->insert([
            [ 'proposal_id' => 2,
              'applicant_id' => \App\Models\Applicant::where('name', 'like', "%Mira%")->pluck('id')->first(),
              'resume' => 'resume.pdf',
              'date_applied' => now(),
            ],
            [ 'proposal_id' => 3,
              'applicant_id' => \App\Models\Applicant::where('name', 'like', "%Randi%")->pluck('id')->first(),
              'resume' => 'resume.pdf',
              'date_applied' => '2022-09-21',
            ],
            [ 'proposal_id' => 1,
              'applicant_id' => \App\Models\Applicant::where('name', 'like', "%Aulia%")->pluck('id')->first(),
              'resume' => 'resume.pdf',
              'date_applied' => now(),
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
        Schema::dropIfExists('proposal_applicants');
    }
}
