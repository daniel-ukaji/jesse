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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('first_name', 20); //first name
            $table->char('last_name', 20); // last name
            $table->string('email')->unique(); // email
            $table->string('phone_number')->nullable(); // phone number

            // Questionaire Questions
            // form 1
            $table->date('date_of_birth')->nullable(); // date of birth
            $table->string('gender')->nullable(); // gender
            $table->string('orientation')->nullable(); //sexual orientation
            $table->string('relationship_status')->nullable(); // what is your marital status
            $table->string('looking_for')->nullable(); // what kind of relationship are you looking for
            $table->string('children')->nullable(); // children?

            // form 2
            $table->string('height')->nullable(); // height
            $table->string('weight')->nullable(); ///weight
            $table->string('body_type')->nullable(); // body type
            $table->string('hair_color')->nullable(); // hair color
            $table->string('eye_color')->nullable(); // eye color
            $table->string('ethnicity')->nullable(); // ethnicity
            $table->string('religion')->nullable(); // religion
            $table->string('zodiac_sign')->nullable(); // zodiac_sign
            $table->string('activity_level')->nullable(); // activity_level

            // form 3
            $table->string('first_language')->nullable(); //first language
            $table->string('second_language')->nullable(); // second language
            $table->string('employed')->nullable(); // employment status
            $table->string('profession')->nullable(); // What is your profession
            $table->string('education')->nullable(); // education

            // form 4
            $table->string('pets')->nullable(); // do you have pets
            $table->string('smokes')->nullable(); // do you smoke
            $table->string('drinks')->nullable(); //do you drink
            $table->string('drugs')->nullable(); // do you take hard drugs
            $table->string('profile_pic')->nullable(); //upload your profile picture
            $table->string('dp_1')->nullable(); //upload your display picture
            $table->string('dp_2')->nullable(); //upload your display picture
            $table->string('country')->nullable(); // country of residence
            $table->string('city')->nullable(); // city
            $table->longText('extra')->nullable(); // short note about yourself
            $table->string('how_jelly')->nullable(); // Are you a jealous kind of person?
            // Questionaire questions end

            $table->string('subscription')->nullable()->default('Free');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
