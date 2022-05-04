<?php namespace Marek\AlzaBE\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProfessionsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alzabe_professions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->boolean('profession');
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_professions');
    }
}
