<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('inward')->comment('On assigned issue. E.g.: Bloqued by [issue]');
            $table->string('outward')->comment('On related issue. E.g.: Blocks [issue]');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_types');
    }
}
