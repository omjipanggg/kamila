<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id', 3);
            $table->char('lead_id', 3);
            $table->string('name');
            $table->integer('department_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('positions', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate();
        });

        \DB::statement('ALTER TABLE positions CHANGE id id INT(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

        \DB::table('positions')->insert([
            [   'lead_id' => 'ITS',    
                'name' => 'IT Support', 
                'department_id' => 1,   
                'created_at' => now(),
                'updated_at' => now()],
            [   'lead_id' => 'ITD',    
                'name' => 'IT Developer',   
                'department_id' => 1,   
                'created_at' => now(),
                'updated_at' => now()],
            [   'lead_id' => 'SEC',    
                'name' => 'Security',   
                'department_id' => 7,   
                'created_at' => now(),
                'updated_at' => now()],
            [   'lead_id' => 'ADS',    
                'name' => 'Admin Support',  
                'department_id' => 8,   
                'created_at' => now(),
                'updated_at' => now()],
            [   'lead_id' => 'ADL',    
                'name' => 'Admin Logistik', 
                'department_id' => 5,   
                'created_at' => now(),
                'updated_at' => now()],
            [   'lead_id' => 'HRS',    
                'name' => 'HR Support', 
                'department_id' => 6,   
                'created_at' => now(),
                'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
