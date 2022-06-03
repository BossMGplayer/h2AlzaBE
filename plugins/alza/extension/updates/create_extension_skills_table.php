<?php namespace Alza\Extension\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateExtensionSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('alza_extension_extension_skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('skill_level');
            $table->unsignedBigInteger('extension_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alza_extension_extension_skills');
    }
}
