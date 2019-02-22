<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_link', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('link_type_id');
            $table->unsignedInteger('inward_issue_id');
            $table->unsignedInteger('outward_issue_id');
            $table->integer('sequence');
            $table->timestamps();

            $table->foreign('link_type_id')->references('id')->on('link_types');
            $table->foreign('inward_issue_id')->references('id')->on('issues');
            $table->foreign('outward_issue_id')->references('id')->on('issues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_link', function (Blueprint $table) {
            $table->dropForeign(['link_type_id']);
            $table->dropForeign(['inward_issue_id']);
            $table->dropForeign(['outward_issue_id']);
        });
        Schema::dropIfExists('issue_link');
    }
}
