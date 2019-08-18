<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDHRCHY5Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDHRCHY5', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('hrchy5id', 256)->nullable();
			$table->string('hrchy4id', 256)->nullable();
			$table->string('hrchy5desc', 256)->nullable();
			$table->string('hrchy5userdesc', 256)->nullable();
			$table->integer('hrchy5order')->nullable();
			$table->string('hrchy5imagefile', 256)->nullable();
			$table->string('hrchy5imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','hrchy5id'], 'CI_PRDHRCHY5');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDHRCHY5');
	}

}
