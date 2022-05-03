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

            $table->enum('extensions', [
                'C',
                'C++',
                'C#',
                'PHP',
                'Java Script',
                'Vue',
                'Java',
                'Python',
                'CSS',
                'Tailwind',
                'Ionic',
                '3D',
                '2D',
                'PixelArt'
            ]);
        });
    }

    public function down()
    {
        Schema::dropIfExists('marek_alzabe_extensions');
    }
}
