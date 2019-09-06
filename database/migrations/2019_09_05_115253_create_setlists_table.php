<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->setlists('user_id');
            $table->string('name');
            $table->string('title');
            $table->string('place');
            $table->string('from_year');
            $table->string('from_month');
            $table->string('from_day');
            $table->string('body', 300);
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
        Schema::dropIfExists('setlists');
    }
}
