<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIssueWorkTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->boolean('is_completed')->default(false);
            $table->string('estimated_time')->default('00:00:00')->nullable();
            $table->string('work_time')->default('00:00:00')->nullable();
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
            $table->dropColumn('is_completed');
            $table->dropColumn('estimated_time');
            $table->dropColumn('work_time');
        });
    }
}
