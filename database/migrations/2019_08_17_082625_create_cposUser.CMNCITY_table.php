<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNCITYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNCITY', function(Blueprint $table)
		{
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('cityid', 256)->nullable();
			$table->string('stateid', 256)->nullable();
			$table->string('cityname', 256)->nullable();
			$table->string('citycode', 256)->nullable();
			$table->string('userdesc', 256)->nullable();
			$table->unique(['active','cityid','stateid'], 'CI_CMNCITY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNCITY');
	}

}
