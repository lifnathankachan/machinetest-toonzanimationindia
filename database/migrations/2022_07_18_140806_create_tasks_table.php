<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            
                $table->id();
                $table->string('title');
                $table->bigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
                $table->date('date');
                $table->time('start_time');
                $table->time('end_time');
                
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
        Schema::dropIfExists('tasks');
    }
}
