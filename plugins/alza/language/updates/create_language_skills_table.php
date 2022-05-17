<?php namespace Alza\Language\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLanguageSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('alza_language_language_skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('experience');
            $table->unsignedBigInteger('language_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alza_language_language_skills');
    }
}
