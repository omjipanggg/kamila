<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        \App\Models\Province::create(['name' => 'Bali']);
        \App\Models\Province::create(['name' => 'Bangka Belitung']);
        \App\Models\Province::create(['name' => 'Banten']);
        \App\Models\Province::create(['name' => 'Bengkulu']);
        \App\Models\Province::create(['name' => 'DI Yogyakarta']);
        \App\Models\Province::create(['name' => 'DKI Jakarta']);
        \App\Models\Province::create(['name' => 'Gorontalo']);
        \App\Models\Province::create(['name' => 'Jambi']);
        \App\Models\Province::create(['name' => 'Jawa Barat']);
        \App\Models\Province::create(['name' => 'Jawa Tengah']);
        \App\Models\Province::create(['name' => 'Jawa Timur']);
        \App\Models\Province::create(['name' => 'Kalimantan Barat']);
        \App\Models\Province::create(['name' => 'Kalimantan Selatan']);
        \App\Models\Province::create(['name' => 'Kalimantan Tengah']);
        \App\Models\Province::create(['name' => 'Kalimantan Timur']);
        \App\Models\Province::create(['name' => 'Kalimantan Utara']);
        \App\Models\Province::create(['name' => 'Kepulauan Riau']);
        \App\Models\Province::create(['name' => 'Lampung']);
        \App\Models\Province::create(['name' => 'Maluku']);
        \App\Models\Province::create(['name' => 'Maluku Utara']);
        \App\Models\Province::create(['name' => 'Nanggroe Aceh Darussalam NAD)']);
        \App\Models\Province::create(['name' => 'Nusa Tenggara Barat NTB)']);
        \App\Models\Province::create(['name' => 'Nusa Tenggara Timur NTT)']);
        \App\Models\Province::create(['name' => 'Papua']);
        \App\Models\Province::create(['name' => 'Papua Barat']);
        \App\Models\Province::create(['name' => 'Riau']);
        \App\Models\Province::create(['name' => 'Sulawesi Barat']);
        \App\Models\Province::create(['name' => 'Sulawesi Selatan']);
        \App\Models\Province::create(['name' => 'Sulawesi Tengah']);
        \App\Models\Province::create(['name' => 'Sulawesi Tenggara']);
        \App\Models\Province::create(['name' => 'Sulawesi Utara']);
        \App\Models\Province::create(['name' => 'Sumatera Barat']);
        \App\Models\Province::create(['name' => 'Sumatera Selatan']);
        \App\Models\Province::create(['name' => 'Sumatera Utara']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}
