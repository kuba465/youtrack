<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_issue', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
        });

        Schema::table('project_members', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::table('issues', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->index('project_manager_id');
            $table->foreign('project_manager_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_issue', function (Blueprint $table) {
            $table->dropForeign('project_id');
            $table->dropForeign('issue_id');
        });

        Schema::table('project_members', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('project_id');
        });

        Schema::table('issues', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('project_id');
            $table->dropForeign('status_id');
            $table->dropForeign('priority_id');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('project_manager_id');
        });
    }
}
