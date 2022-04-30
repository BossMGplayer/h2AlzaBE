<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_people', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            // Fotka
            $table->string('name');
            $table->string('surname');
            $table->integer('pay');
            $table->integer('email');
            $table->integer('phone');
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_people');
    }
}