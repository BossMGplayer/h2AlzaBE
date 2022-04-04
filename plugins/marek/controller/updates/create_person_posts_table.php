<?php namespace Marek\Controller\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePersonPostsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_controller_person_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_controller_person_posts');
    }
}
