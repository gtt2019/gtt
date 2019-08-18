<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDHRCHY1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDHRCHY1', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('hrchy1id', 256)->nullable();
			$table->string('hrchy1desc', 256)->nullable();
			$table->string('hrchy1userdesc', 256)->nullable();
			$table->integer('hrchy1order')->nullable();
			$table->string('hrchy1imagefile', 256)->nullable();
			$table->string('hrchy1imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','hrchy1id'], 'CI_PRDHRCHY1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDHRCHY1');
	}

}
