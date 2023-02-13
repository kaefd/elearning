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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('grade_id')->nullable();
            $table->string('name');
            $table->string('nis');
            $table->string('gender');
            $table->string('birthplace');
            $table->date('dob');
            $table->text('alamat');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('students');
    }
};
