<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_team', function (Blueprint $table) {
            $table->integer('league_id')->unsigned()->nullable();
            $table->foreign('league_id')->references('id')
                ->on('leagues')->onDelete('cascade');
            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')
                ->on('teams')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['league_id', 'team_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_team');
    }
}
