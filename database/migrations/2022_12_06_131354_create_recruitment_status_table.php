<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        \DB::table('recruitment_status')->insert([
            ['name' => 'Lamaran terkirim', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Screening', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Menunggu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Interview', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Offering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Selesai', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_status');
    }
}
