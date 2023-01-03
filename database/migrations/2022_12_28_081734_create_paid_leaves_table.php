<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_leaves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \DB::table('paid_leaves')->insert([
            ['name' => 'Cuti tahunan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti menikah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti melahirkan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti sakit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti bersama', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti suami baru', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti kegiatan keagamaan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuti tanpa keterangan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paid_leaves');
    }
}
