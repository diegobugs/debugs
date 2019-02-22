<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('reported_by');
            $table->unsignedInteger('assigned_to');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('priority_id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('resolution_id')->nullable();
            $table->unsignedInteger('severity_id')->nullable();

            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->timestamp('resolution_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->integer('views')->nullable();
            $table->integer('votes')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('reported_by')->references('id')->on('users');
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('resolution_id')->references('id')->on('resolutions');
            $table->foreign('severity_id')->references('id')->on('severities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['reported_by']);
            $table->dropForeign(['assigned_to']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['priority_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['resolution_id']);
            $table->dropForeign(['severity_id']);
        });
        Schema::dropIfExists('issues');
    }
}
