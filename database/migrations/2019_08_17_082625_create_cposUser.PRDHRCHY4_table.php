<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDHRCHY4Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDHRCHY4', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('hrchy4id', 256)->nullable();
			$table->string('hrchy3id', 256)->nullable();
			$table->string('hrchy4desc', 256)->nullable();
			$table->string('hrchy4userdesc', 256)->nullable();
			$table->integer('hrchy4order')->nullable();
			$table->string('hrchy4imagefile', 256)->nullable();
			$table->string('hrchy4imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','hrchy4id','hrchy3id'], 'CI_PRDHRCHY4');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDHRCHY4');
	}

}
