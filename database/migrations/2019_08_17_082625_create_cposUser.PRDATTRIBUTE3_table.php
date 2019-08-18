<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE3Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE3', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr3id', 256)->nullable();
			$table->string('atr3desc', 256)->nullable();
			$table->string('atr3userdesc', 256)->nullable();
			$table->string('atr3note', 512)->nullable();
			$table->integer('atr3order')->nullable();
			$table->unique(['companyid','active','atr3id'], 'CI_PRDATTRIBUTE3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE3');
	}

}
