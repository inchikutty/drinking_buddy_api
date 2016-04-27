<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGyroscope extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gyroscope', function (Blueprint $table) {
            $table->increments('id');
            $table->string('x');
            $table->string('y');
						$table->string('z');
						$table->string('date');
						$table->string('time');
						$table->string('color');
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
		Schema::drop('gyroscope');
	}

}
