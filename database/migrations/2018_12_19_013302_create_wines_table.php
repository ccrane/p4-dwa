<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('wine_types');

            $table->integer('variety_id')->unsigned();
            $table->foreign('variety_id')->references('id')->on('grape_varieties');

            $table->integer('winery_id')->unsigned();
            $table->foreign('winery_id')->references('id')->on('wineries');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');

            $table->string('name');
            $table->year('vintage');
            $table->decimal('price',9,3);
            $table->string('bottle_image_url');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->dropForeign('wines_region_id_foreign');
            $table->dropForeign('wines_country_id_foreign');
            $table->dropForeign('wines_winery_id_foreign');
            $table->dropForeign('wines_variety_id_foreign');
            $table->dropForeign('wines_type_id_foreign');
        });

        Schema::dropIfExists('wines');
    }
}
