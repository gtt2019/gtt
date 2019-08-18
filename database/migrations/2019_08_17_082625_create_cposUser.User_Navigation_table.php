<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.UserNavigationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.User_Navigation', function(Blueprint $table)
		{
			$table->integer('Navigation_Id', true);
			$table->integer('User_Id');
			$table->string('Navigated', 100);
			$table->dateTime('Navigation_Start_Time');
			$table->dateTime('Navigation_End_Time');
			$table->integer('Created_By')->nullable();
			$table->timestamp('Created_On')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.User_Navigation');
	}

}
