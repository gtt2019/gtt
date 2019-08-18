<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDATTRIBUTE17Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDATTRIBUTE17', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('atr17id', 256)->nullable();
			$table->string('atr17desc', 256)->nullable();
			$table->string('atr17userdesc', 256)->nullable();
			$table->string('atr17note', 512)->nullable();
			$table->integer('atr17order')->nullable();
			$table->unique(['companyid','active','atr17id'], 'CI_PRDATTRIBUTE17');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDATTRIBUTE17');
	}

}
