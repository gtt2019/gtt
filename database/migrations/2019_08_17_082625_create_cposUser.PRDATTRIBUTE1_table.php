<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE1', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr1id', 256)->nullable();
			$table->string('atr1desc', 256)->nullable();
			$table->string('atr1userdesc', 256)->nullable();
			$table->string('atr1note', 512)->nullable();
			$table->integer('atr1order')->nullable();
			$table->unique(['companyid','active','atr1id'], 'CI_PRDATTRIBUTE1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE1');
	}

}
