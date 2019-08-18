<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDHRCHY3Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDHRCHY3', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('hrchy3id', 256)->nullable();
			$table->string('hrchy2id', 256)->nullable();
			$table->string('hrchy3desc', 256)->nullable();
			$table->string('hrchy3userdesc', 256)->nullable();
			$table->integer('hrchy3order')->nullable();
			$table->string('hrchy3imagefile', 256)->nullable();
			$table->string('hrchy3imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','hrchy3id','hrchy2id'], 'CI_PRDHRCHY3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDHRCHY3');
	}

}
