<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->mediumText('description');
            $table->string('main-image');
            $table->string('social_1_content');
            $table->string('social_1_link');
            $table->string('social_1_img');
            $table->string('social_2_content');
            $table->string('social_2_link');
            $table->string('social_2_img');
            $table->string('social_3_content');
            $table->string('social_3_link');
            $table->string('social_3_img');
            $table->string('social_4_content');
            $table->string('social_4_link');
            $table->string('social_4_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
}
