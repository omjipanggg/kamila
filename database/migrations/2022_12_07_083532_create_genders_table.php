<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('name');
            $table->timestamps();
        });

        \DB::table('genders')->insert([
            ['id' => '1', 'name' => 'Laki-laki'],
            ['id' => '4', 'name' => 'Perempuan'],
            ['id' => '5', 'name' => 'Lainnya']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genders');
    }
}
