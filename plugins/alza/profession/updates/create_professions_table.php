<?php namespace Alza\Profession\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProfessionsTable extends Migration
{
    public function up()
    {
        Schema::create('alza_profession_professions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');

            $table->unsignedBigInteger('person_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alza_profession_professions');
    }
}
