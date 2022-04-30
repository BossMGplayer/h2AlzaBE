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

            $table->boolean('C')->default(false);
            $table->boolean('C++')->default(false);
            $table->boolean('C#')->default(false);
            $table->boolean('PHP')->default(false);
            $table->boolean('Java Script')->default(false);
            $table->boolean('Vue')->default(false);
            $table->boolean('Java')->default(false);
            $table->boolean('Python')->default(false);
            $table->boolean('CSS')->default(false);
            $table->boolean('Tailwind')->default(false);
            $table->boolean('Ionic')->default(false);

            $table->boolean('3D')->default(false);
            $table->boolean('2D')->default(false);
            $table->boolean('Pixel Art')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_extensions');
    }
}
