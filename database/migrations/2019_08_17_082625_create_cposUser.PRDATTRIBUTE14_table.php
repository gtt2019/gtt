<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE14Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE14', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr14id', 256)->nullable();
			$table->string('atr14desc', 256)->nullable();
			$table->string('atr14userdesc', 256)->nullable();
			$table->string('atr14note', 512)->nullable();
			$table->integer('atr14order')->nullable();
			$table->unique(['companyid','active','atr14id'], 'CI_PRDATTRIBUTE14');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE14');
	}

}
