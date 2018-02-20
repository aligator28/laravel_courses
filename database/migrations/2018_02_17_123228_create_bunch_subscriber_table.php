<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBunchSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bunch_subscriber', function (Blueprint $table) {
            $table->integer('bunch_id')->unsigned()->nullable();
          
            $table->foreign('bunch_id')->references('id')
                ->on('bunches')->onDelete('cascade');

            $table->integer('subscriber_id')->unsigned()->nullable();
            $table->foreign('subscriber_id')->references('id')
                ->on('subscribers')->onDelete('cascade');

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
        Schema::dropIfExists('bunch_subscriber');
    }
}
