<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('descr')->nullable();
            $table->integer('created_by');
            $table->boolean('sent');

            $table->integer('bunch_id')->unsigned()->index()->nullable();
            $table->foreign('bunch_id')->references('id')->on('bunches');

            $table->integer('template_id')->unsigned()->index()->nullable();
            $table->foreign('template_id')->references('id')->on('templates');

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
        Schema::dropIfExists('campaigns');
    }
}
