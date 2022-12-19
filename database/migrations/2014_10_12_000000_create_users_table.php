<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('users', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->string('name')->nullable();
            $table->char('role_id', 8)->index();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnUpdate()->default('BASIC001')->nullable();
        });

        \DB::table('users')->insert([
            'id' => substr(\Str::uuid(), 0, 8),
            'name' => 'Administrator',
            'role_id' => 'ADMIN001',
            'email' => 'admin@kamila.com',
            'password' => '$2y$10$Ke4KhwYXd/3DaxgiUNX7a.pxbXF01hnjVMBomJxF/nDrrEpKg42yK',
            // 'remember_token' => \Str::random(64),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}