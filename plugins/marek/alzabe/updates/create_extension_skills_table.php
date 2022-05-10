<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateExtensionSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_extension_skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->integer('extension_id')->nullable();
            $table->boolean('extensionSkill')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_extension_skills');
    }
}
