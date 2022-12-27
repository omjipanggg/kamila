<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaritalStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marital_status', function (Blueprint $table) {
            $table->id();
            $table->string('name', 16);
            $table->timestamps();
        });

        \DB::table('marital_status')->insert([
            ['name' => 'Lajang', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Menikah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bercerai', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_status');
    }
}
