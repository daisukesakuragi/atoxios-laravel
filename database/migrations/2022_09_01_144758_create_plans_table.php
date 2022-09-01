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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id');
            $table->string('slug');
            $table->string('title');
            $table->string('eyecatch_img_id');
            $table->string('eyecatch_img_url');
            $table->text('description');
            $table->dateTime('started_at');
            $table->dateTime('finished_at');
            $table->tinyInteger('fundraising_ratio')->unsigned();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
