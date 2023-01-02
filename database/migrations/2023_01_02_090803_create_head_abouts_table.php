<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('heading');
            $table->mediumText('description');
            $table->string('heading_btn_1');
            $table->string('heading_btn_2');
            $table->string('image');
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
        Schema::dropIfExists('head_abouts');
    }
}
