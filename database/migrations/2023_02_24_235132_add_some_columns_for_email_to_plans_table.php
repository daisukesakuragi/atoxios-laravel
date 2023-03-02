<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dateTime('event_held_at')->after('finished_at');
            $table->string('event_location')->after('event_held_at');
            $table->string('event_meeting_location')->after('event_location');
            $table->time('event_meeting_time')->after('event_meeting_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('event_held_at');
            $table->dropColumn('event_location');
            $table->dropColumn('event_meeting_location');
            $table->dropColumn('event_meeting_time');
        });
    }
};
