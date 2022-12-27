<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->cascadeOnUpdate();
            $table->text('qualification')->nullable();
            $table->text('description')->nullable();
            $table->string('permalink')->nullable();
            $table->string('phone_number', 16)->nullable();
            $table->char('vendor_id', 8)->index();
            $table->foreign('vendor_id')->references('id')->on('vendors')->cascadeOnUpdate();
            $table->char('published_by', 8)->index();
            $table->foreign('published_by')->references('id')->on('users')->cascadeOnUpdate();
            $table->date('expire_date')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
        });

        \DB::table('proposals')->insert([
            [
                'position_id' => 4,
                'qualification' => 'Word, Excel, PowerPoint.',
                'description' => 'Mampu bernegosiasi.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '081311315925',
                'vendor_id' => 'TELKOM01',
                'published_by' => 'QCTH4Q7I',
                'expire_date' => today()->addDays(44),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 2,
                'qualification' => 'HTML, CSS, JS.',
                'description' => 'Mampu membuat sebuah program.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '081311315925',
                'vendor_id' => 'TELKOM01',
                'published_by' => 'QCTH4Q7I',
                'expire_date' => today()->addDays(21),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 3,
                'qualification' => 'Menjaga, melindungi, mengayomi.',
                'description' => 'Mampu bekerja di bawah tekanan.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '081211920182',
                'vendor_id' => 'BUMN0001',
                'published_by' => 'QCTH4Q7I',
                'expire_date' => today()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 5,
                'qualification' => 'Sama seperti di atas.',
                'description' => 'Mampu bernegosiasi.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '087810289921',
                'vendor_id' => 'TELKOM01',
                'published_by' => 'QCTH4Q7I',
                'expire_date' => today()->addDays(31),
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
        Schema::dropIfExists('proposals');
    }
}
