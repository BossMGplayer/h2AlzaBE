<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateExtensionsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_extensions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('extension')->default(false);
            $table->integer('profession_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_extensions');
    }
}
