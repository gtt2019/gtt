<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNCOUNTRYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNCOUNTRY', function(Blueprint $table)
		{
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('countryid', 256)->nullable();
			$table->string('countryname', 256)->nullable();
			$table->string('countrycode', 256)->nullable();
			$table->string('isocode', 256)->nullable();
			$table->string('userdesc', 256)->nullable();
			$table->unique(['active','countryid'], 'CI_CMNCOUNTRY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNCOUNTRY');
	}

}
