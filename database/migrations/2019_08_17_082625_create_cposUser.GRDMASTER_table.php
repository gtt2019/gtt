<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.GRDMASTERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.GRDMASTER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('grdmasterID', 256)->nullable();
			$table->string('grddesc', 256)->nullable();
			$table->string('grduserdesc', 256)->nullable();
			$table->string('grdchar1', 256)->nullable();
			$table->string('grdplace1', 256)->nullable();
			$table->string('grdchar2', 256)->nullable();
			$table->string('grdplace2', 256)->nullable();
			$table->string('grdchar3', 256)->nullable();
			$table->string('grdplace3', 256)->nullable();
			$table->string('grdchar4', 256)->nullable();
			$table->string('grdplace4', 256)->nullable();
			$table->string('grdchar5', 256)->nullable();
			$table->string('grdplace5', 256)->nullable();
			$table->unique(['companyid','active','grdmasterID'], 'CI_GRDMASTER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.GRDMASTER');
	}

}
