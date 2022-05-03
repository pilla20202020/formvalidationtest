<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',255);
            $table->string('lastname',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->string('nationality',255);
            $table->string('phone',255);
            $table->boolean('gender');
            $table->date('dob');
            $table->string('education');
            $table->string('mode_of_contact');
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
        Schema::dropIfExists('candidates');
    }
}
