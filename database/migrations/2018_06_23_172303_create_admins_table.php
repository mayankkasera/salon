<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('shope_name');
            $table->text('shop_address');
            $table->string('shop_location_lat');
            $table->string('shop_location_long');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('password');
            $table->dateTime('shop_opening_time');
            $table->dateTime('shop_closing_time');
            $table->text('profile_image');
            $table->text('logo');
            $table->integer('no_of_seats');
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
        Schema::dropIfExists('admins');
    }
}
