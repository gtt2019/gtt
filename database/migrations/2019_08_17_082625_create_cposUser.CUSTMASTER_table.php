<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CUSTMASTERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CUSTMASTER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('customerid', 256)->nullable();
			$table->string('storeid', 256)->nullable();
			$table->char('custtitle', 30)->nullable();
			$table->string('firstname', 256)->nullable();
			$table->string('lastname', 256)->nullable();
			$table->dateTime('dob')->nullable();
			$table->dateTime('anniversary')->nullable();
			$table->char('gender', 30)->nullable();
			$table->unique(['companyid','active','customerid','storeid'], 'CI_CUSTMASTER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CUSTMASTER');
	}

}
