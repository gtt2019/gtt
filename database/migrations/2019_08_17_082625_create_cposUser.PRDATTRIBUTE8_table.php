<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE8Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE8', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr8id', 256)->nullable();
			$table->string('atr8desc', 256)->nullable();
			$table->string('atr8userdesc', 256)->nullable();
			$table->string('atr8note', 512)->nullable();
			$table->integer('atr8order')->nullable();
			$table->unique(['companyid','active','atr8id'], 'CI_PRDATTRIBUTE8');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE8');
	}

}
