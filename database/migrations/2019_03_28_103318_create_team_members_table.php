<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('image');
            $table->text('designation');
            $table->longText('description');
            $table->text('f_icon')->nullable();
            $table->mediumText('f_link')->nullable();
            $table->text('t_icon')->nullable();
            $table->mediumText('t_link')->nullable();
            $table->text('l_icon')->nullable();
            $table->mediumText('l_link')->nullable();
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
        Schema::dropIfExists('team_members');
    }
}
