<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_languages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('language')->default(false);
            $table->integer('post_person_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_languages');
    }
}
