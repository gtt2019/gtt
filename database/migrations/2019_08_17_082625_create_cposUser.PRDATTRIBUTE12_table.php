<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE12Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE12', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr12id', 256)->nullable();
			$table->string('atr12desc', 256)->nullable();
			$table->string('atr12userdesc', 256)->nullable();
			$table->string('atr12note', 512)->nullable();
			$table->integer('atr12order')->nullable();
			$table->unique(['companyid','active','atr12id'], 'CI_PRDATTRIBUTE12');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE12');
	}

}
