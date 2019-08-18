<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CUSTCHOICETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CUSTCHOICE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('choiceid', 256)->nullable();
			$table->string('choicedesc', 256)->nullable();
			$table->string('choiceuserdesc', 256)->nullable();
			$table->unique(['companyid','active','choiceid'], 'CI_CUSTCHOICE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CUSTCHOICE');
	}

}
