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
            $table->id();
            $table->char('lead_id', 3);
            $table->string('name', 64);
            $table->string('description')->nullable();
            $table->timestamps();
        });

        \DB::statement('ALTER TABLE roles CHANGE id id INT(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

        \DB::table('roles')->insert([
            [
                'lead_id' => 'ADM',
                'name' => 'Administrator',
                'description' => 'Akses akun administrator.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lead_id' => 'BSC',
                'name' => 'Basic',
                'description' => 'Akses akun default atau biasa.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lead_id' => 'SCR',
                'name' => 'Security',
                'description' => 'Akses akun divisi keamanan.',
                'created_at' => now(),
                'updated_at' => now()
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
        Schema::dropIfExists('roles');
    }
}
