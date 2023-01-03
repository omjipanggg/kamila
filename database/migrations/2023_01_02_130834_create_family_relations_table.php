<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_relations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \App\Models\FamilyRelation::create(['name' => 'Ayah']);
        \App\Models\FamilyRelation::create(['name' => 'Ibu']);
        \App\Models\FamilyRelation::create(['name' => 'Suami']);
        \App\Models\FamilyRelation::create(['name' => 'Istri']);
        \App\Models\FamilyRelation::create(['name' => 'Anak']);
        \App\Models\FamilyRelation::create(['name' => 'Kakak']);
        \App\Models\FamilyRelation::create(['name' => 'Adik']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_relations');
    }
}
