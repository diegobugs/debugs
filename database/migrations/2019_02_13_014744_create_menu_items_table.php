<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: Un menu item pertenece a un menu
        // y si pertenece a un menu item es un menu desplegable (?)
        Schema::create('menu_items', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('menu_id');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_items', function(Blueprint $table){
            $table->dropForeign(['menu_id']);
        });
        Schema::dropIfExists('menu_items');
    }
}
