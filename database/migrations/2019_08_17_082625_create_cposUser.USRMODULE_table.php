<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USRMODULETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USRMODULE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('moduleid', 256)->nullable();
			$table->string('modulename', 256)->nullable();
			$table->string('moduleuserdesc', 256)->nullable();
			$table->unique(['companyid','active','moduleid'], 'CI_USRMODULE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USRMODULE');
	}

}
