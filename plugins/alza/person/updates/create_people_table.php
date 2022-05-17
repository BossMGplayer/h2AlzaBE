<?php namespace Alza\Person\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('alza_person_people', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('surname');
            $table->string('description');
            $table->integer('pay');
            $table->string('email');
            $table->string('phone');
            $table->string('city');

            //$table->unsignedBigInteger('user_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alza_person_people');
    }
}
