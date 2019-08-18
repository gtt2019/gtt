<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE20Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE20', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr20id', 256)->nullable();
			$table->string('atr20desc', 256)->nullable();
			$table->string('atr20userdesc', 256)->nullable();
			$table->string('atr20note', 512)->nullable();
			$table->integer('atr20order')->nullable();
			$table->unique(['companyid','active','atr20id'], 'CI_PRDATTRIBUTE20');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE20');
	}

}
