<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_abouts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status');
            $table->string('heading_title');
            $table->mediumText('heading_desc');
            $table->string('heading_image');
            $table->string('heading_btn_1')->nullable();
            $table->string('heading_btn_2')->nullable();
            $table->string('why_us_title');
            $table->mediumText('why_us_desc');
            $table->string('why_us_image');
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
        Schema::dropIfExists('static_abouts');
    }
}
