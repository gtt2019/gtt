<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.STREMPLOYEETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.STREMPLOYEE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('employeeid', 256)->nullable();
			$table->string('storeid', 256)->nullable();
			$table->string('roleid', 256)->nullable();
			$table->string('firstname', 256)->nullable();
			$table->string('lastname', 256)->nullable();
			$table->string('strusername', 256)->nullable();
			$table->string('strpassword', 256)->nullable();
			$table->integer('loginattempts')->nullable();
			$table->string('imagefilename', 256)->nullable();
			$table->string('imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','employeeid','storeid','roleid'], 'CI_STREMPLOYEE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.STREMPLOYEE');
	}

}
