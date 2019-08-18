<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.GRDMAPPINGTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.GRDMAPPING', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->string('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('grdmapid', 256)->nullable();
			$table->string('grdcatid', 256)->nullable();
			$table->string('grddesc', 256)->nullable();
			$table->string('grduserdesc', 256)->nullable();
			$table->unique(['companyid','active','grdmapid','grdcatid'], 'CI_GRDMAPPING');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.GRDMAPPING');
	}

}
