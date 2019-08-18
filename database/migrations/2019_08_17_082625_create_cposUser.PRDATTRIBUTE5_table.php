<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE5Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE5', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr5id', 256)->nullable();
			$table->string('atr5desc', 256)->nullable();
			$table->string('atr5userdesc', 256)->nullable();
			$table->string('atr5note', 512)->nullable();
			$table->integer('atr5order')->nullable();
			$table->unique(['companyid','active','atr5id'], 'CI_PRDATTRIBUTE5');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE5');
	}

}
