<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE13Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE13', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr13id', 256)->nullable();
			$table->string('atr13desc', 256)->nullable();
			$table->string('atr13userdesc', 256)->nullable();
			$table->string('atr13note', 512)->nullable();
			$table->integer('atr13order')->nullable();
			$table->unique(['companyid','active','atr13id'], 'CI_PRDATTRIBUTE13');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE13');
	}

}
