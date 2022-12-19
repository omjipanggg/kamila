<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        \DB::table('religions')->insert([
            ['name' => 'Budha', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hindu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Islam', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Katolik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kong-Hu-Chu', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('religions');
    }
}
