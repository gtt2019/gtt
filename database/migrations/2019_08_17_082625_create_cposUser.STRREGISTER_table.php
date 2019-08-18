<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.STRREGISTERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.STRREGISTER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('registerid', 256)->nullable();
			$table->string('storeid', 256)->nullable();
			$table->string('registerdesc', 256)->nullable();
			$table->string('registeruserdesc', 256)->nullable();
			$table->unique(['companyid','active','registerid','storeid'], 'CI_STRREGISTER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.STRREGISTER');
	}

}
