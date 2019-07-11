<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_1')->unsigned()->nullable();
            $table->integer('team_1_score')->unsigned()->nullable();
            $table->foreign('team_1')->references('id')
                ->on('teams')->onDelete('cascade');
            $table->integer('team_2')->unsigned()->nullable();
            $table->integer('team_2_score')->unsigned()->nullable();
            $table->foreign('team_2')->references('id')
                ->on('teams')->onDelete('cascade');
            $table->integer('league_id')->unsigned()->nullable();
            $table->foreign('league_id')->references('id')->on('leagues')
                ->onDelete('cascade');
            $table->boolean('pointsAdded')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
