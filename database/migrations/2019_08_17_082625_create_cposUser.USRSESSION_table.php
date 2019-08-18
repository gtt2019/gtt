<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USRSESSIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USRSESSION', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('usersessionid', 256)->nullable();
			$table->string('usrid', 256)->nullable();
			$table->integer('usrsession')->nullable();
			$table->dateTime('timestamp')->nullable();
			$table->string('deviceid', 256)->nullable();
			$table->unique(['companyid','usersessionid','usrid'], 'CI_USRSESSION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USRSESSION');
	}

}
