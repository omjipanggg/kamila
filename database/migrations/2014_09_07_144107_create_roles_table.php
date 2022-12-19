<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->string('name', 64);
            $table->string('description')->nullable();
            $table->timestamps();
        });

        \DB::table('roles')->insert([
            [
                'id' => 'ADMIN001',
                'name' => 'Administrator',
                'description' => 'Complete control of the database.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'BASIC001',
                'name' => 'Basic',
                'description' => 'Basic regular user privilege.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
