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
            $table->foreignId('position_id')->references('id')->on('positions')->cascadeOnUpdate();
            $table->text('qualification')->nullable();
            $table->text('description')->nullable();
            $table->string('permalink')->nullable();
            $table->string('phone_number', 16)->nullable();
            $table->foreignId('vendor_id')->cascadeOnUpdate()->constrained();
            $table->foreignUuid('published_by')->cascadeOnUpdate()->constrained('users');
            $table->date('expire_date')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        \DB::table('proposals')->insert([
            [
                'position_id' => 4,
                'qualification' => 'Word, Excel, PowerPoint.',
                'description' => 'Mampu bernegosiasi.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '081311315925',
                'vendor_id' => \App\Models\Vendor::where('name', 'Telkomsel Inti Maya')->pluck('id')->first(),
                'published_by' => \App\Models\User::where('name', 'Administrator')->pluck('id')->first(),
                'expire_date' => today()->addDays(44),
            ],
            [
                'position_id' => 2,
                'qualification' => 'HTML, CSS, JS.',
                'description' => 'Mampu membuat sebuah program.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '081311315925',
                'vendor_id' => \App\Models\Vendor::where('name', 'BUMN Sejati Selamanya')->pluck('id')->first(),
                'published_by' => \App\Models\User::where('name', 'Administrator')->pluck('id')->first(),
                'expire_date' => today()->addDays(21),
            ],
            [
                'position_id' => 3,
                'qualification' => 'Menjaga, melindungi, mengayomi.',
                'description' => 'Mampu bekerja di bawah tekanan.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '081211920182',
                'vendor_id' => \App\Models\Vendor::where('name', 'Telkomsel Inti Maya')->pluck('id')->first(),
                'published_by' => \App\Models\User::where('name', 'Administrator')->pluck('id')->first(),
                'expire_date' => today()->addDays(10),
            ],
            [
                'position_id' => 5,
                'qualification' => 'Sama seperti di atas.',
                'description' => 'Mampu bernegosiasi.',
                'permalink' => 'http://www.google.com/',
                'phone_number' => '087810289921',
                'vendor_id' => \App\Models\Vendor::where('name', 'Telkomsel Inti Maya')->pluck('id')->first(),
                'published_by' => \App\Models\User::where('name', 'Administrator')->pluck('id')->first(),
                'expire_date' => today()->addDays(31),
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
