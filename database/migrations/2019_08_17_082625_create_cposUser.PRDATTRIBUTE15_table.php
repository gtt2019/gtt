<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE15Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE15', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr15id', 256)->nullable();
			$table->string('atr15desc', 256)->nullable();
			$table->string('atr15userdesc', 256)->nullable();
			$table->string('atr15note', 512)->nullable();
			$table->integer('atr15order')->nullable();
			$table->unique(['companyid','active','atr15id'], 'CI_PRDATTRIBUTE15');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE15');
	}

}
