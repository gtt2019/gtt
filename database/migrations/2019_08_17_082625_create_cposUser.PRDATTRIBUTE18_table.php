<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE18Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE18', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr18id', 256)->nullable();
			$table->string('atr18desc', 256)->nullable();
			$table->string('atr18userdesc', 256)->nullable();
			$table->string('atr18note', 512)->nullable();
			$table->integer('atr18order')->nullable();
			$table->unique(['companyid','active','atr18id'], 'CI_PRDATTRIBUTE18');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE18');
	}

}
