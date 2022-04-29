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

            $table->boolean('Bratislava')->default(false);
            $table->boolean('Nitra')->default(false);
            $table->boolean('Martin')->default(false);
            $table->boolean('Komárno')->default(false);
            $table->boolean('Banská Bystrica')->default(false);

            $table->boolean('Bardejov')->default(false);
            $table->boolean('Trenčín')->default(false);
            $table->boolean('Prievidza')->default(false);
            $table->boolean('Spišská Nová Ves')->default(false);
            $table->boolean('Žilina')->default(false);

            $table->boolean('Poprad')->default(false);
            $table->boolean('Považská Bystrica')->default(false);
            $table->boolean('Levice')->default(false);
            $table->boolean('Lučenec')->default(false);
            $table->boolean('Hummenné')->default(false);

            $table->boolean('Levoča')->default(false);
            $table->boolean('Kežmarok')->default(false);
            $table->boolean('Pieštany')->default(false);
            $table->boolean('Bratislava')->default(false);
            $table->boolean('Bratislava')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_cities');
    }
}
