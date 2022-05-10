<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLanguageSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_language_skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->integer('language_id')->nullable();
            $table->boolean('languageSkill')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_language_skills');
    }
}
