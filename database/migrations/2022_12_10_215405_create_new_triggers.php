<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateNewTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER bind_employees AFTER INSERT ON `users` FOR EACH ROW BEGIN INSERT INTO `employees` (`user_id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NEW.id, NEW.name, NEW.email, NEW.created_at, NEW.updated_at); END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `bind_employees`');
    }
}
