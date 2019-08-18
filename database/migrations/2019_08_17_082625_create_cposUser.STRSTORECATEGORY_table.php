<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.STRSTORECATEGORYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.STRSTORECATEGORY', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('storecatid', 256)->nullable();
			$table->string('storeid', 256)->nullable();
			$table->string('catid', 256)->nullable();
			$table->unique(['companyid','active','storecatid','storeid','catid'], 'CI_STRSTORECATEGORY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.STRSTORECATEGORY');
	}

}
