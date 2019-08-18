<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USRUSERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USRUSER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('usrid', 256)->nullable();
			$table->string('typeid', 256)->nullable();
			$table->string('roleid', 256)->nullable();
			$table->string('firstname', 256)->nullable();
			$table->string('lastname', 256)->nullable();
			$table->string('gender', 256)->nullable();
			$table->dateTime('dob')->nullable();
			$table->string('email', 256)->nullable();
			$table->string('mobile', 256)->nullable();
			$table->string('usrpassword', 256)->nullable();
			$table->string('deviceid', 256)->nullable();
			$table->string('notificationid', 256)->nullable();
			$table->string('otp', 256)->nullable();
			$table->string('socialid', 256)->nullable();
			$table->string('socialtype', 256)->nullable();
			$table->integer('loginattempts')->nullable();
			$table->char('isverified', 1)->nullable();
			$table->char('istermcondagreed', 1)->nullable();
			$table->string('profileimagename', 256)->nullable();
			$table->string('profileimagepath', 256)->nullable();
			$table->unique(['companyid','active','usrid','typeid'], 'CI_USRUSER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USRUSER');
	}

}
