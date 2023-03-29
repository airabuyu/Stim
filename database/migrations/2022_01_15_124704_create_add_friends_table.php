<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_add');
            $table->unsignedBigInteger('user_acc');
            $table->string('status');
            $table->foreign('user_add')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_acc')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('add_friends');
    }
}
