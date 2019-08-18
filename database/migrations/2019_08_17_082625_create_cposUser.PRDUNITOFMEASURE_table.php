<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDUNITOFMEASURETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDUNITOFMEASURE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('uomid', 256)->nullable();
			$table->string('uomcode', 256)->nullable();
			$table->string('uomdesc', 256)->nullable();
			$table->string('uomuserdesc', 256)->nullable();
			$table->unique(['companyid','active','uomid'], 'CI_PRDUNITOFMEASURE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDUNITOFMEASURE');
	}

}
