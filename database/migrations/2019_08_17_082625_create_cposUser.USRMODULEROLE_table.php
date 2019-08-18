<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USRMODULEROLETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USRMODULEROLE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('userrolemoduleid', 256)->nullable();
			$table->string('moduleid', 256)->nullable();
			$table->string('roleid', 256)->nullable();
			$table->char('readonly', 3)->nullable();
			$table->char('readwrite', 3)->nullable();
			$table->unique(['companyid','active','userrolemoduleid','moduleid','roleid'], 'CI_USRMODULEROLE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USRMODULEROLE');
	}

}
