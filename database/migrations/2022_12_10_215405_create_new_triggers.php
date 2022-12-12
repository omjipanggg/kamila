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
        DB::unprepared('CREATE TRIGGER bind_users AFTER INSERT ON `users` FOR EACH ROW BEGIN INSERT INTO `applicants` (`id`, `auth_id`, `name`, `email`) VALUES (NEW.id, NEW.id, NEW.name, NEW.email); END;');
        DB::unprepared('CREATE TRIGGER bind_employees AFTER UPDATE ON `users` FOR EACH ROW BEGIN IF NEW.is_admin <=> 1 THEN INSERT INTO `employees`(`id`, `detail_id`) SELECT NEW.id, OLD.id FROM `users`; END IF; END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `bind_users`');
        DB::unprepared('DROP TRIGGER `bind_employees`');
    }
}
