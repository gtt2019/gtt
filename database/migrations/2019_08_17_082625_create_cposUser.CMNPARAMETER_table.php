<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNPARAMETERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNPARAMETER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('parameterid', 256)->nullable();
			$table->string('parameterarea', 256)->nullable();
			$table->string('parametertype', 256)->nullable();
			$table->string('parameterquery', 256)->nullable();
			$table->string('parametervalue', 256)->nullable();
			$table->string('parameternote', 512)->nullable();
			$table->unique(['companyid','active','parameterid'], 'CI_CMNPARAMETER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNPARAMETER');
	}

}
