<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.MobileAuthenticationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.Mobile_Authentication', function(Blueprint $table)
		{
			$table->integer('Mobile_Auth_Id', true);
			$table->string('OTP', 10);
			$table->integer('User_Id');
			$table->dateTime('OTP_Created_On');
			$table->dateTime('OTP_Expire_On');
			$table->boolean('Is_Active')->nullable()->default(1);
			$table->timestamp('Created_On')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('Modified_On')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.Mobile_Authentication');
	}

}
