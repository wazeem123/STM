<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReliefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reliefs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grade',3);
            $table->string('1')->default('No subject Entered');
            $table->string('2')->default('No subject Entered');
            $table->string('3')->default('No subject Entered');
            $table->string('4')->default('No subject Entered');
            $table->string('5')->default('No subject Entered');
            $table->string('6')->default('No subject Entered');
            $table->string('7')->default('No subject Entered');
            $table->string('8')->default('No subject Entered');
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
        Schema::dropIfExists('reliefs');
    }
}
