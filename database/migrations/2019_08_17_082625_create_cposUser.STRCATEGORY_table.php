<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.STRCATEGORYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.STRCATEGORY', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('strid', 256)->nullable();
			$table->string('strdesc', 256)->nullable();
			$table->string('struserdesc', 256)->nullable();
			$table->unique(['companyid','active','strid'], 'CI_STRCATEGORY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.STRCATEGORY');
	}

}
