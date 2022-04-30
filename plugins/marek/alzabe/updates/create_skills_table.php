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

            $table->boolean('Beginner')->default(false);
            $table->boolean('Intermediate')->default(false);
            $table->boolean('Expert')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_skills');
    }
}
