<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        \DB::table('vendors')->insert([
            [
            'id' => 'TELKOM01',
            'name' => 'Telkomsel Inti Maya',
            'address' => 'Jl. K.H. Burhanudin No.19 RT.004/017, Duren Sawit, Jakarta 16530',
            'description' => 'Telkomsel.',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'id' => 'BUMN0001',
            'name' => 'BUMN',
            'address' => 'Jl. Mawar No.57 RT.001/004, Grogol, Jakarta Barat 16530',
            'description' => 'BUMN.',
            'created_at' => now(),
            'updated_at' => now(),
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
        Schema::dropIfExists('vendors');
    }
}
