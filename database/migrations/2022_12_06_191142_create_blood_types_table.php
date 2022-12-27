<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 2);
            $table->timestamps();
        });
        \DB::table('blood_types')->insert([
            ['name' => 'A', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'B', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'O', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_types');
    }
}
