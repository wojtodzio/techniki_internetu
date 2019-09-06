<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('login')->unique();
            $table->string('country');
            $table->string('city');
            $table->string('street_address');
            $table->enum('education', ['higher', 'middle', 'basic']);
        });

        Schema::create('interest_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('interest_id')->unsigned();
            $table->foreign('interest_id')->references('id')->on('interests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interest_user');
        Schema::dropIfExists('interests');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('login');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('street_address');
            $table->dropColumn('education');
        });
    }
}
