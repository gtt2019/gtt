<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE2', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr2id', 256)->nullable();
			$table->string('atr2desc', 256)->nullable();
			$table->string('atr2userdesc', 256)->nullable();
			$table->string('atr2note', 512)->nullable();
			$table->integer('atr2order')->nullable();
			$table->unique(['companyid','active','atr2id'], 'CI_PRDATTRIBUTE2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE2');
	}

}
