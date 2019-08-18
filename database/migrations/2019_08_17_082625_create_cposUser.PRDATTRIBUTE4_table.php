<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE4Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE4', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr4id', 256)->nullable();
			$table->string('atr4desc', 256)->nullable();
			$table->string('atr4userdesc', 256)->nullable();
			$table->string('atr4note', 512)->nullable();
			$table->integer('atr4order')->nullable();
			$table->unique(['companyid','active','atr4id'], 'CI_PRDATTRIBUTE4');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE4');
	}

}
