<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNZIPCODETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNZIPCODE', function(Blueprint $table)
		{
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('zipcodeid', 256)->nullable();
			$table->string('cityid', 256)->nullable();
			$table->string('zipcodearea', 256)->nullable();
			$table->string('zipcode', 256)->nullable();
			$table->string('userdesc', 256)->nullable();
			$table->unique(['active','zipcodeid','cityid'], 'CI_CMNZIPCODE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNZIPCODE');
	}

}
