<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE16Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE16', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr16id', 256)->nullable();
			$table->string('atr16desc', 256)->nullable();
			$table->string('atr16userdesc', 256)->nullable();
			$table->string('atr16note', 512)->nullable();
			$table->integer('atr16order')->nullable();
			$table->unique(['companyid','active','atr16id'], 'CI_PRDATTRIBUTE16');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE16');
	}

}
