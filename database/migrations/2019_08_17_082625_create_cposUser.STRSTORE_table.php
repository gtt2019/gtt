<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.STRSTORETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.STRSTORE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('storeid', 256)->nullable();
			$table->string('name', 256)->nullable();
			$table->string('latitude', 256)->nullable();
			$table->string('longitude', 256)->nullable();
			$table->string('rating', 256)->nullable();
			$table->string('owner', 256)->nullable();
			$table->string('tin', 256)->nullable();
			$table->string('imagefilename', 256)->nullable();
			$table->string('imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','storeid'], 'CI_STRSTORE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.STRSTORE');
	}

}
