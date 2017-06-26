<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description');
            // localization data
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            //user reference
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();

        });
        // add product relashionship
        Schema::table('products', function (Blueprint $table) {
          $table->integer('restaurant_id')->unsigned()->nullable();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('products', function (Blueprint $table) {
          $table->dropForeign('products_restaurant_id_foreign');
          $table->dropColumn('restaurant_id');
        });
          Schema::dropIfExists('restaurants');
    }
}
