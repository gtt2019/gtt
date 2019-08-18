<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.IMPORTBATCHTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.IMPORTBATCH', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->integer('batchid')->nullable();
			$table->dateTime('batchdate')->nullable();
			$table->string('tablename', 256)->nullable();
			$table->string('batchstatus', 256)->nullable();
			$table->dateTime('importdate')->nullable();
			$table->unique(['companyid','batchid','tablename'], 'CI_IMPORTBATCH');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.IMPORTBATCH');
	}

}
