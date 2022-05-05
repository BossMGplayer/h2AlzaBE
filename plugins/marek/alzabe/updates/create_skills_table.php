<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('skill')->default(false);
            $table->integer('language_id')->nullable();
            $table->integer('extension_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_skills');
    }
}
