<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->text("desc");
            $table->string("content",250);
            $table->double("price",8, 2);
            $table->string("img",100);

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('trainer_id');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('trainer_id')->references('id')->on('trainers');

            
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
        Schema::dropIfExists('courses');
    }
}
