<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE11Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE11', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr11id', 256)->nullable();
			$table->string('atr11desc', 256)->nullable();
			$table->string('atr11userdesc', 256)->nullable();
			$table->string('atr11note', 512)->nullable();
			$table->integer('atr11order')->nullable();
			$table->unique(['companyid','active','atr11id'], 'CI_PRDATTRIBUTE11');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE11');
	}

}
