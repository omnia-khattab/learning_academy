<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('title',100);
            $table->string('logo',100); 
            $table->string('favicon',100);
            $table->string('country',100);
            $table->string('address',100);
            $table->string('phone',100);
            $table->string('workHours',100);
            $table->string('email',100);
            $table->string('facebook',100);
            $table->string('twitter',100);
            $table->string('instagram',100);
            $table->text('map');

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
        Schema::dropIfExists('setting_contact');
    }
}
