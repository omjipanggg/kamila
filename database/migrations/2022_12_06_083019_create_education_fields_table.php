<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \App\Models\EducationField::create(['name' => 'Kedokteran']);
        \App\Models\EducationField::create(['name' => 'Akuntansi']);
        \App\Models\EducationField::create(['name' => 'Teknik Informatika']);
        \App\Models\EducationField::create(['name' => 'Sistem Informasi']);
        \App\Models\EducationField::create(['name' => 'Desain Komunikasi Visual']);
        \App\Models\EducationField::create(['name' => 'Desain Produk']);
        \App\Models\EducationField::create(['name' => 'Teknik Sipil']);
        \App\Models\EducationField::create(['name' => 'Manajemen']);
        \App\Models\EducationField::create(['name' => 'Teknik Industri']);
        \App\Models\EducationField::create(['name' => 'Teknik Lingkungan']);
        \App\Models\EducationField::create(['name' => 'Ilmu Komunikasi']);
        \App\Models\EducationField::create(['name' => 'Teknologi Pangan']);
        \App\Models\EducationField::create(['name' => 'Ilmu Politik']);
        \App\Models\EducationField::create(['name' => 'Matematika']);
        \App\Models\EducationField::create(['name' => 'Teknik Elektro']);
        \App\Models\EducationField::create(['name' => 'Pariwisata']);
        \App\Models\EducationField::create(['name' => 'Teologi']);
        \App\Models\EducationField::create(['name' => 'Keamanan']);
        \App\Models\EducationField::create(['name' => 'Lainnya']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_fields');
    }
}
