<?php namespace Marek\Alza\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alza_people', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('surname');

            $table->string('mail');
            $table->string('phone');

            $table->string('city');



        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alza_people');
    }
}
