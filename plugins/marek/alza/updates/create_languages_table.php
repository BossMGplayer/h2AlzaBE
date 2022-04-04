<?php namespace Marek\Alza\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alza_languages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('ENG')->default(false)->nullable();
            $table->boolean('HEB')->default(false)->nullable();
            $table->boolean('GER')->default(false)->nullable();
            $table->boolean('SVK')->default(false)->nullable();
            $table->boolean('CZE')->default(false)->nullable();
            $table->boolean('RUS')->default(false)->nullable();
            $table->boolean('POL')->default(false)->nullable();
            $table->boolean('FRE')->default(false)->nullable();
            $table->boolean('HUN')->default(false)->nullable();
            $table->boolean('CHN')->default(false)->nullable();
            $table->boolean('MON')->default(false)->nullable();
            $table->boolean('JAP')->default(false)->nullable();
            $table->boolean('ESP')->default(false)->nullable();
            $table->boolean('PRT')->default(false)->nullable();
            $table->boolean('ITA')->default(false)->nullable();
            $table->boolean('RUM')->default(false)->nullable();
            $table->boolean('GRC')->default(false)->nullable();
            $table->boolean('BGR')->default(false)->nullable();
            $table->boolean('UKR')->default(false)->nullable();
            $table->boolean('SRB')->default(false)->nullable();
            $table->boolean('HRV')->default(false)->nullable();
            $table->boolean('FIN')->default(false)->nullable();
            $table->boolean('SWE')->default(false)->nullable();
            $table->boolean('NOR')->default(false)->nullable();
            $table->boolean('GEO')->default(false)->nullable();
            $table->boolean('TUR')->default(false)->nullable();
            $table->boolean('IND')->default(false)->nullable();
            $table->boolean('ISR')->default(false)->nullable();
            $table->boolean('EGY')->default(false)->nullable();
            $table->boolean('MEX')->default(false)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alza_languages');
    }
}
