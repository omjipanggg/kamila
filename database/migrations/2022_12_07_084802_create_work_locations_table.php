<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street')->nullable();
            $table->char('erte')->nullable();
            $table->char('erwe')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->char('zipcode', 5)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });

        \DB::table('work_locations')->insert([
            'name' => 'KAM Raden Inten',
            'street' => 'Jl. Raden Inten II No.66',
            'erte' => '001',
            'erwe' => '007',
            'district' => 'Duren Sawit',
            'state' => 'Duren Sawit',
            'city' => 'Jakarta Timur',
            'name' => '13440',
            'latitude' => '-6.2465382',
            'longitude' => '106.9168531',
            'created_at' => now(),
            'updated_at' => now(),
        ],);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_locations');
    }
}
