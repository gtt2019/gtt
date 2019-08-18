<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE7Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE7', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr7id', 256)->nullable();
			$table->string('atr7desc', 256)->nullable();
			$table->string('atr7userdesc', 256)->nullable();
			$table->string('atr7note', 512)->nullable();
			$table->integer('atr7order')->nullable();
			$table->unique(['companyid','active','atr7id'], 'CI_PRDATTRIBUTE7');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE7');
	}

}
