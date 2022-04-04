<?php namespace Marek\Alza\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProffesionsTable extends Migration
{
    public function up()
    {
        Schema::create('marek_alza_proffesions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->boolean('programmer')->default(false)->nullable();
            $table->boolean('cook')->default(false)->nullable();
            $table->boolean('security')->default(false)->nullable();
            $table->boolean('manager')->default(false)->nullable();
            $table->boolean('photograph')->default(false)->nullable();
            $table->boolean('cashier')->default(false)->nullable();
            $table->boolean('model')->default(false)->nullable();
            $table->boolean('warehouseWorker')->default(false)->nullable();
            $table->boolean('accountant')->default(false)->nullable();
            $table->boolean('artist')->default(false)->nullable();
            $table->boolean('server')->default(false)->nullable();
            $table->boolean('caretaker')->default(false)->nullable();
            $table->boolean('babysitter')->default(false)->nullable();
            $table->boolean('translator')->default(false)->nullable();
            $table->boolean('constructionWorker')->default(false)->nullable();
            $table->boolean('mechanic')->default(false)->nullable();
            $table->boolean('handyman')->default(false)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alza_proffesions');
    }
}
