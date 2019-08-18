<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE9Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE9', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr9id', 256)->nullable();
			$table->string('atr9desc', 256)->nullable();
			$table->string('atr9userdesc', 256)->nullable();
			$table->string('atr9note', 512)->nullable();
			$table->integer('atr9order')->nullable();
			$table->unique(['companyid','active','atr9id'], 'CI_PRDATTRIBUTE9');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE9');
	}

}
