<?php namespace Marek\Alza\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePersonPostsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alza_person_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('Staz')->default(false)->nullable();
            $table->boolean('Praca')->default(false)->nullable();
            $table->boolean('Brigada')->default(false)->nullable();
            $table->boolean('Dobrovolnictvo')->default(false)->nullable();

            $table->integer('Pay');
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alza_person_posts');
    }
}
