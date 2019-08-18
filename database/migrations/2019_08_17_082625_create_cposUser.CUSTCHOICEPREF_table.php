<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CUSTCHOICEPREFTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CUSTCHOICEPREF', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('customerid', 256)->nullable();
			$table->string('choiceid', 256)->nullable();
			$table->unique(['companyid','active','customerid','choiceid'], 'CI_CUSTCHOICEPREF');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CUSTCHOICEPREF');
	}

}
