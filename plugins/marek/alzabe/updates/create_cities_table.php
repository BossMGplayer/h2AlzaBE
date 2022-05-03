<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('cityName');
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_cities');
    }
}
