<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('observation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
						$table->string('sensor');
						$table->string('observed_action');
						$table->string('color');
						$table->string('x');
						$table->string('y');
						$table->string('z');
						$table->date('date');
						$table->time('time');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
