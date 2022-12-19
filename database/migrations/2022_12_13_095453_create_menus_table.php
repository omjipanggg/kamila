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
            $table->char('role_id', 8)->index();
            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnUpdate()->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('parent_id')->default(0)->nullable();
            $table->tinyInteger('has_child')->default(0)->nullable();
            $table->string('model')->nullable();
            $table->string('route');
            $table->timestamps();
        });

        \DB::table('menus')->insert([
            [
                'name' => 'Dashboard',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dashboard',
                'role_id' => 'BASIC001',
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presensi',
                'role_id' => 'BASIC001',
                'icon' => 'fa-bell',
                'route' => 'employee.ring',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presensi',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-bell',
                'route' => 'employee.attendance',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Attendance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Izin',
                'role_id' => 'BASIC001',
                'icon' => 'fa-umbrella-beach',
                'route' => 'employee.permit',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Permit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lembur',
                'role_id' => 'BASIC001',
                'icon' => 'fa-hourglass-half',
                'route' => 'employee.overtime',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Overtime',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Patroli',
                'role_id' => 'BASIC001',
                'icon' => 'fa-taxi',
                'route' => 'employee.patrol',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Patrol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Payslip',
                'role_id' => 'BASIC001',
                'icon' => 'fa-sack-dollar',
                'route' => 'employee.payslip',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Payslip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Akun Terdaftar',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-users',
                'route' => 'user.index',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rekrutmen',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-file-circle-plus',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 1,
                'model' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Pelamar',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-user-plus',
                'route' => 'applicant.index',
                'parent_id' => 11,
                'has_child' => 0,
                'model' => 'Applicant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lowongan Kerja',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-folder-open',
                'route' => 'proposal.index',
                'parent_id' => 11,
                'has_child' => 0,
                'model' => 'Proposal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seleksi',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-flask-vial',
                'route' => 'applicant.test',
                'parent_id' => 11,
                'has_child' => 0,
                'model' => 'Test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penilaian',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-medal',
                'route' => 'applicant.score',
                'parent_id' => 11,
                'has_child' => 0,
                'model' => 'Score',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Offering Letter',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-file-lines',
                'route' => 'applicant.approval',
                'parent_id' => 11,
                'has_child' => 0,
                'model' => 'Offering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ',
                'role_id' => 'ADMIN001',
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Fask',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FAQ',
                'role_id' => 'BASIC001',
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'model' => 'Fask',
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
