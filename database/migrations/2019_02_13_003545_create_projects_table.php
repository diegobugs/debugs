<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skey', 6)->comment('Project Shortcut Key. E.g.: DEBUGS');
            $table->string('name')->comment('Project\'s name. E.g.: Debugs');
            $table->text('description')->nullable();
            $table->timestamps();
            // TODO: Agregar softDelete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
