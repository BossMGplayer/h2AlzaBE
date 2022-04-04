<?php namespace Marek\Alza\Updates;

use phpDocumentor\Reflection\Types\Boolean;
use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alza_skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->boolean('Beginner')->default(false)->nullable();
            $table->boolean('Advanced')->default(false)->nullable();
            $table->boolean('Expert')->default(false)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alza_skills');
    }
}
