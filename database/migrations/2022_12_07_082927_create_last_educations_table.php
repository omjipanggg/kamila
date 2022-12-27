<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_educations', function (Blueprint $table) {
            $table->id();
            $table->char('name', 3);
            $table->timestamps();
        });

        \DB::table('last_educations')->insert([
            ['name' => 'S3', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D4', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D3', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'D1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SMA', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SMK', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SMP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'SD', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('last_educations');
    }
}
