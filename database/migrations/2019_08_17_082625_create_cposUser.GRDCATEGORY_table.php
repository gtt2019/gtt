<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.GRDCATEGORYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.GRDCATEGORY', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('grdid', 256)->nullable();
			$table->string('grddesc', 256)->nullable();
			$table->string('grduserdesc', 256)->nullable();
			$table->unique(['companyid','active','grdid'], 'CI_GRDCATEGORY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.GRDCATEGORY');
	}

}
