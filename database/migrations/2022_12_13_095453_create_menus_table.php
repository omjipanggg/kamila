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
            $table->foreignId('role_id')->cascadeOnUpdate()->nullable()->constrained();
            $table->string('icon')->nullable();
            $table->tinyInteger('parent_id')->default(0)->nullable();
            $table->boolean('has_child')->default(0)->nullable();
            $table->boolean('has_param')->nullable();
            $table->boolean('status')->nullable();
            $table->string('model')->nullable();
            $table->string('route');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \DB::table('menus')->insert([
            [
                'id' => 1,
                'name' => 'Dashboard',
                'role_id' => 1,
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 2,
                'name' => 'Dashboard',
                'role_id' => 2,
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 3,
                'name' => 'Dashboard',
                'role_id' => 3,
                'icon' => 'fa-house-chimney',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 4,
                'name' => 'Presensi',
                'role_id' => 2,
                'icon' => 'fa-bell',
                'route' => 'employee.ring',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 5,
                'name' => 'Presensi',
                'role_id' => 3,
                'icon' => 'fa-bell',
                'route' => 'employee.ring',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 6,
                'name' => 'Presensi',
                'role_id' => 1,
                'icon' => 'fa-bell',
                'route' => 'dashboard.display',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'attendance'
            ],
            [
                'id' => 7,
                'name' => 'Izin',
                'role_id' => 2,
                'icon' => 'fa-umbrella-beach',
                'route' => 'employee.permit',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'permit'
            ],
            [
                'id' => 8,
                'name' => 'Lembur',
                'role_id' => 2,
                'icon' => 'fa-hourglass-half',
                'route' => 'employee.overtime',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'overtime'
            ],
            [
                'id' => 9,
                'name' => 'Patroli',
                'role_id' => 3,
                'icon' => 'fa-taxi',
                'route' => 'employee.patrol',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'patrol'
            ],
            [
                'id' => 10,
                'name' => 'Payslip',
                'role_id' => 2,
                'icon' => 'fa-sack-dollar',
                'route' => 'employee.payslip',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'payslip'
            ],
            [
                'id' => 11,
                'name' => 'Payslip',
                'role_id' => 3,
                'icon' => 'fa-sack-dollar',
                'route' => 'employee.payslip',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => 'payslip'
            ],
            [
                'id' => 12,
                'name' => 'Akun Terdaftar',
                'role_id' => 1,
                'icon' => 'fa-users',
                'route' => 'dashboard.display',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'user'
            ],
            [
                'id' => 13,
                'name' => 'Rekrutmen',
                'role_id' => 1,
                'icon' => 'fa-file-circle-plus',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 1,
                'status' => 0,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 14,
                'name' => 'Data Pelamar',
                'role_id' => 1,
                'icon' => 'fa-user-plus',
                'route' => 'dashboard.display',
                'parent_id' => 13,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'applicant'
            ],
            [
                'id' => 15,
                'name' => 'Lowongan Kerja',
                'role_id' => 1,
                'icon' => 'fa-folder-open',
                'route' => 'dashboard.display',
                'parent_id' => 13,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'proposal'
            ],
            [
                'id' => 16,
                'name' => 'Seleksi',
                'role_id' => 1,
                'icon' => 'fa-flask-vial',
                'route' => 'recruitment.test',
                'parent_id' => 13,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 17,
                'name' => 'Penilaian',
                'role_id' => 1,
                'icon' => 'fa-medal',
                'route' => 'recruitment.score',
                'parent_id' => 13,
                'has_child' => 0,
                'status' => 0,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 18,
                'name' => 'PKWT Digital',
                'role_id' => 1,
                'icon' => 'fa-file-lines',
                'route' => 'contract.index',
                'parent_id' => 13,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 19,
                'name' => 'Settings',
                'role_id' => 1,
                'icon' => 'fa-sliders',
                'route' => 'dashboard.index',
                'parent_id' => 0,
                'has_child' => 1,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 20,
                'name' => 'Hak Akses',
                'role_id' => 1,
                'icon' => 'fa-unlock-keyhole',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'role'
            ],
            [
                'id' => 21,
                'name' => 'Departemen',
                'role_id' => 1,
                'icon' => 'fa-building-user',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'department'
            ],
            [
                'id' => 22,
                'name' => 'Jabatan',
                'role_id' => 1,
                'icon' => 'fa-user-tie',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'position'
            ],
            [
                'id' => 23,
                'name' => 'Provinsi',
                'role_id' => 1,
                'icon' => 'fa-mountain-city',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'province'
            ],
            [
                'id' => 24,
                'name' => 'Kab./Kota',
                'role_id' => 1,
                'icon' => 'fa-city',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'city'
            ],
            [
                'id' => 25,
                'name' => 'Mitra',
                'role_id' => 1,
                'icon' => 'fa-handshake',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'vendor'
            ],
            [
                'id' => 26,
                'name' => 'Menu',
                'role_id' => 1,
                'icon' => 'fa-bars',
                'route' => 'dashboard.display',
                'parent_id' => 19,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 1,
                'model' => 'menu'
            ],
            [
                'id' => 27,
                'name' => 'FAQ',
                'role_id' => 1,
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 28,
                'name' => 'FAQ',
                'role_id' => 2,
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
            ],
            [
                'id' => 29,
                'name' => 'FAQ',
                'role_id' => 3,
                'icon' => 'fa-circle-question',
                'route' => 'dashboard.faq',
                'parent_id' => 0,
                'has_child' => 0,
                'status' => 1,
                'has_param' => 0,
                'model' => NULL
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
