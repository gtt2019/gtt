<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.UserSessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.User_Session', function(Blueprint $table)
		{
			$table->integer('Session_id', true);
			$table->integer('User_Id');
			$table->dateTime('Login_time');
			$table->string('Session_Status', 20);
			$table->string('Hostname', 50)->nullable();
			$table->string('Program_Name', 50)->nullable();
			$table->string('cmd', 50)->nullable();
			$table->string('Net_Address', 100)->nullable();
			$table->string('Net_Library', 100)->nullable();
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
		Schema::drop('cposUser.User_Session');
	}

}
