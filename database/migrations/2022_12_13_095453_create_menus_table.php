<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnUpdate()->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('parent_id')->default(0)->nullable();
            $table->tinyInteger('has_child')->default(0)->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('has_param')->nullable();
            $table->string('model')->nullable();
            $table->string('route');
            $table->timestamps();
        });

        \DB::table('menus')->insert([
            [
                'name' => 'Dashboard',
                'role_id' => 1,
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dashboard',
                'role_id' => 2,
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presensi',
                'role_id' => 2,
                'icon' => 'fa-bell',
                'route' => 'employee.ring',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presensi',
                'role_id' => 3,
                'icon' => 'fa-bell',
                'route' => 'employee.ring',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presensi',
                'role_id' => 1,
                'icon' => 'fa-bell',
                'route' => 'dashboard.display',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'attendance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Izin',
                'role_id' => 2,
                'icon' => 'fa-umbrella-beach',
                'route' => 'employee.permit',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'permit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lembur',
                'role_id' => 2,
                'icon' => 'fa-hourglass-half',
                'route' => 'employee.overtime',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'overtime',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Patroli',
                'role_id' => 3,
                'icon' => 'fa-taxi',
                'route' => 'employee.patrol',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'patrol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Payslip',
                'role_id' => 2,
                'icon' => 'fa-sack-dollar',
                'route' => 'employee.payslip',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'payslip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Payslip',
                'role_id' => 3,
                'icon' => 'fa-sack-dollar',
                'route' => 'employee.payslip',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'payslip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Akun Terdaftar',
                'role_id' => 1,
                'icon' => 'fa-users',
                'route' => 'dashboard.display',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rekrutmen',
                'role_id' => 1,
                'icon' => 'fa-file-circle-plus',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 1,
                'status' => 0,
                'has_param' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Pelamar',
                'role_id' => 1,
                'icon' => 'fa-user-plus',
                'route' => 'dashboard.display',
                'parent_id' => 12,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'applicant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lowongan Kerja',
                'role_id' => 1,
                'icon' => 'fa-folder-open',
                'route' => 'dashboard.display',
                'parent_id' => 12,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'proposal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seleksi',
                'role_id' => 1,
                'icon' => 'fa-flask-vial',
                'route' => 'applicant.test',
                'parent_id' => 12,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penilaian',
                'role_id' => 1,
                'icon' => 'fa-medal',
                'route' => 'applicant.score',
                'parent_id' => 12,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'Score',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Offering Letter',
                'role_id' => 1,
                'icon' => 'fa-file-lines',
                'route' => 'applicant.approval',
                'parent_id' => 12,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'offering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ',
                'role_id' => 1,
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'fask',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ',
                'role_id' => 2,
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'fask',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ',
                'role_id' => 3,
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => 'fask',
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::dropIfExists('menus');
    }
}
