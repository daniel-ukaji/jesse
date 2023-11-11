<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('gender');
            $table->string('sexual_orientation');
            $table->string('height')->nullable(); // height
            $table->string('body_type')->nullable(); // body type
            $table->string('hair_color')->nullable(); // hair color
            $table->string('eye_color')->nullable(); // eye color
            $table->string('how_pa')->nullable(); // How physically active do you want your partner to be?
            $table->string('education')->nullable(); // education

            $table->string('rel_type')->nullable(); // what type of relation are you looking for
            $table->string('how_jelly')->nullable(); // can you date a jealous person
            $table->string('ethnicity')->nullable(); // ethnicity
            $table->string('religion')->nullable(); // religion
            $table->string('zodiac_sign')->nullable(); // zodiac_sign
            $table->string('country')->nullable(); // can you date someone that smokes

            $table->string('children')->nullable(); // children
            $table->string('date_pet_owner')->nullable(); // can you date someone that owns pet(s)
            $table->string('date_drug')->nullable(); // can you date someone that does drugs
            $table->string('date_drink')->nullable(); // can you date someone that drinks
            $table->string('date_smoker')->nullable(); // can you date someone that smokes
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
        Schema::dropIfExists('seeks');
    }
};
