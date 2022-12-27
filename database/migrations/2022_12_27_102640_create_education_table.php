<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->char('name', 3);
            $table->timestamps();
        });

        \App\Models\Education::create(['name' => 'S3']);
        \App\Models\Education::create(['name' => 'S2']);
        \App\Models\Education::create(['name' => 'S1']);
        \App\Models\Education::create(['name' => 'D4']);
        \App\Models\Education::create(['name' => 'D3']);
        \App\Models\Education::create(['name' => 'D2']);
        \App\Models\Education::create(['name' => 'D1']);
        \App\Models\Education::create(['name' => 'SMA']);
        \App\Models\Education::create(['name' => 'SMK']);
        \App\Models\Education::create(['name' => 'SMP']);
        \App\Models\Education::create(['name' => 'SD']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
