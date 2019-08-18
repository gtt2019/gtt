<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDHRCHY2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDHRCHY2', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('hrchy2id', 256)->nullable();
			$table->string('hrchy1id', 256)->nullable();
			$table->string('hrchy2desc', 256)->nullable();
			$table->string('hrchy2userdesc', 256)->nullable();
			$table->integer('hrchy2order')->nullable();
			$table->string('hrchy2imagefile', 256)->nullable();
			$table->string('hrchy2imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','hrchy2id','hrchy1id'], 'CI_PRDHRCHY2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDHRCHY2');
	}

}
