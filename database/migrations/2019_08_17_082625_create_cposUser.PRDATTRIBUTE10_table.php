<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE10Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE10', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr10id', 256)->nullable();
			$table->string('atr10desc', 256)->nullable();
			$table->string('atr10userdesc', 256)->nullable();
			$table->string('atr10note', 512)->nullable();
			$table->integer('atr10order')->nullable();
			$table->unique(['companyid','active','atr10id'], 'CI_PRDATTRIBUTE10');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE10');
	}

}
