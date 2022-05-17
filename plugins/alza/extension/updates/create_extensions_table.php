<?php namespace Alza\Extension\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateExtensionsTable extends Migration
{
    public function up()
    {
        Schema::create('alza_extension_extensions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->unsignedBigInteger('profession_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alza_extension_extensions');
    }
}
