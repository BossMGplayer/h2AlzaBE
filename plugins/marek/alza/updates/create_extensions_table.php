<?php namespace Marek\Alza\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateExtensionsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alza_extensions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('C')->default(false)->nullable();
            $table->boolean('C++')->default(false)->nullable();
            $table->boolean('C#')->default(false)->nullable();
            $table->boolean('Java')->default(false)->nullable();
            $table->boolean('JavaScript')->default(false)->nullable();
            $table->boolean('CSS')->default(false)->nullable();
            $table->boolean('Ruby')->default(false)->nullable();
            $table->boolean('PHP')->default(false)->nullable();
            $table->boolean('Python')->default(false)->nullable();
            $table->boolean('Kotlin')->default(false)->nullable();

            $table->boolean('HasGun')->default(false)->nullable();

            $table->boolean('AsianKitchen')->default(false)->nullable();
            $table->boolean('MexicanKitchen')->default(false)->nullable();
            $table->boolean('AfricanKitchen')->default(false)->nullable();
            $table->boolean('AsianKitchen')->default(false)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alza_extensions');
    }
}
