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
            $table->string('name', 64);
            $table->foreignId('employee_level_id')->cascadeOnUpdate()->constrained();
            $table->string('description')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });


        \App\Models\Role::create(
            ['employee_level_id' => 1,'name' => 'Administrator', 'description' => 'Akses akun administrator.']
        );
        \App\Models\Role::create(
            ['employee_level_id' => 1,'name' => 'Basic', 'description' => 'Akses akun default atau biasa.']
        );
        \App\Models\Role::create(
            ['employee_level_id' => 4,'name' => 'Security', 'description' => 'Akses akun divisi keamanan.']
        );
        \App\Models\Role::create(
            ['employee_level_id' => 2,'name' => 'Supervisor', 'description' => 'Akses akun menu supervisor.']
        );
        \App\Models\Role::create(
            ['employee_level_id' => 3,'name' => 'Manager', 'description' => 'Akses akun menu manager.']
        );
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
