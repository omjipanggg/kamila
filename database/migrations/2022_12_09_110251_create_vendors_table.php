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
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('description')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \DB::table('vendors')->insert([
            [ 'name' => 'Telkomsel Inti Maya', 'address' => 'Jl. K.H. Burhanudin No.19 RT.004/017, Duren Sawit, Jakarta 16530', ],
            [ 'name' => 'BUMN Sejati Selamanya', 'address' => 'Jl. Mawar No.57 RT.001/004, Grogol, Jakarta Barat 16530', ],
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
