<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE19Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE19', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr19id', 256)->nullable();
			$table->string('atr19desc', 256)->nullable();
			$table->string('atr19userdesc', 256)->nullable();
			$table->string('atr19note', 512)->nullable();
			$table->integer('atr19order')->nullable();
			$table->unique(['companyid','active','atr19id'], 'CI_PRDATTRIBUTE19');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE19');
	}

}
