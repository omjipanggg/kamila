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
            $table->char('id', 8)->primary();
            $table->char('department_id', 8)->index();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->nullable();
            $table->text('qualification')->nullable();
            $table->text('description')->nullable();
            $table->string('permalink')->nullable();
            $table->string('phone_number', 16)->nullable();
            $table->char('vendor_id', 8)->index();
            $table->foreign('vendor_id')->references('id')->on('vendors')->cascadeOnUpdate()->nullable();
            $table->char('published_by', 8)->index();
            $table->foreign('published_by')->references('id')->on('users')->cascadeOnUpdate()->nullable();
            $table->timestamps();
        });
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
