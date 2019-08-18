<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USRROLETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USRROLE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('roleid', 256)->nullable();
			$table->string('usrrole', 256)->nullable();
			$table->string('roledesc', 256)->nullable();
			$table->string('roleuserdesc', 256)->nullable();
			$table->unique(['companyid','active','roleid'], 'CI_USRROLE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USRROLE');
	}

}
