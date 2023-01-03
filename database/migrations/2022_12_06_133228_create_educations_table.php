<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
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
            $table->string('name');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        \App\Models\Education::create(['name' => 'Tidak ada']);
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
