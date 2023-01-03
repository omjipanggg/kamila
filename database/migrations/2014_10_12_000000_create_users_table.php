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
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->foreignId('role_id')->cascadeOnUpdate()->constrained();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        
        \App\Models\User::create(
            [
                'name' => 'Administrator',
                'role_id' => \App\Models\Role::where('name', 'Administrator')->pluck('id')->first(),
                'email' => 'admin@kamila.com',
                'password' => '$2y$10$Ke4KhwYXd/3DaxgiUNX7a.pxbXF01hnjVMBomJxF/nDrrEpKg42yK',
            ]
        );
        \App\Models\User::create(
            [
                'name' => 'Mawlana Ajie Pamungkas',
                'role_id' => \App\Models\Role::where('name', 'Security')->pluck('id')->first(),
                'email' => 'mawlana@kamila.com',
                'password' => '$2y$10$QphSdTW2mSvMyWRlRCHhIekInxQU83srlFY/DJAsFUoFedTajHJym',
            ]
        );
        \App\Models\User::create(
            [
                // 'id' => \Str::uuid(),
                // 'remember_token' => \Str::random(64),
                'name' => 'Aulia Maharani Putri',
                'role_id' => \App\Models\Role::where('name', 'Basic')->pluck('id')->first(),
                'email' => 'aulia@kamila.com',
                'password' => '$2y$10$VWeyZncj3DePHoYwtS3VRuepjnw/TqA/WgMmFnnrlGqpSnkutsgFu',
            ]
        );
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