<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNSTATETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNSTATE', function(Blueprint $table)
		{
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('stateid', 256)->nullable();
			$table->string('countryid', 256)->nullable();
			$table->string('statename', 256)->nullable();
			$table->string('statecode', 256)->nullable();
			$table->string('userdesc', 256)->nullable();
			$table->unique(['active','stateid','countryid'], 'CI_CMNSTATE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNSTATE');
	}

}
