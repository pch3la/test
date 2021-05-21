<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('subject');
            $table->text('description')->nullable('true');
            $table->boolean('status');
            $table->string('priority');
            $table->bigInteger('attached_file')->unsigned()->nullable('true');
            //$table->bigInteger('solution_id')->unsigned()->nullable('true');
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('report_id')->unsigned();
            $table->bigInteger('assignee_id')->unsigned();
            $table->bigInteger('dash_board_id')->unsigned();
            $table->timestamps();
            $table->foreign('attached_file')->references('id')->on('files')->onDelete('cascade');
            //$table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('report_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dash_board_id')->references('id')->on('dash_boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
