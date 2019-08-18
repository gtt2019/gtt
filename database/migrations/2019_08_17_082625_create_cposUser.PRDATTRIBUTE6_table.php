<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE6Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE6', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr6id', 256)->nullable();
			$table->string('atr6desc', 256)->nullable();
			$table->string('atr6userdesc', 256)->nullable();
			$table->string('atr6note', 512)->nullable();
			$table->integer('atr6order')->nullable();
			$table->unique(['companyid','active','atr6id'], 'CI_PRDATTRIBUTE6');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE6');
	}

}
