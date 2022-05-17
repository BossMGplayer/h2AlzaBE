<?php namespace Alza\Language\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('alza_language_languages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->unsignedBigInteger('person_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alza_language_languages');
    }
}
