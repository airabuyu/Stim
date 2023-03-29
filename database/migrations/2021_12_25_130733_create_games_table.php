<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name');
            $table->timestamps();
            $table->text('description');
            $table->text('long_description');
            $table->string('category');
            $table->string('developer');
            $table->string('publisher');
            $table->integer('price');
            $table->date('made_at')->nullable();
            $table->string('cover');
            $table->string('trailer');
            $table->string('adult')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
