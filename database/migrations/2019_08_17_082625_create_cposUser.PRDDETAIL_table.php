<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDDETAILTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDDETAIL', function(Blueprint $table)
		{
			$table->string('companyID', 256)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('prddetailid', 256)->nullable();
			$table->string('prdid', 256)->nullable();
			$table->string('prdstoreid', 256)->nullable();
			$table->string('prdbarcode', 512)->nullable();
			$table->string('prdchar1', 256)->nullable();
			$table->string('prdchar2', 256)->nullable();
			$table->string('prdchar3', 256)->nullable();
			$table->string('prdchar4', 256)->nullable();
			$table->string('prdchar5', 256)->nullable();
			$table->integer('prdqtyonorder')->nullable();
			$table->integer('prdqtyonhand')->nullable();
			$table->decimal('prdaveragecost', 19, 4)->nullable();
			$table->decimal('prdcurrentsellingprice', 19, 4)->nullable();
			$table->decimal('prdcurrentprice', 19, 4)->nullable();
			$table->decimal('prdlastcost', 19, 4)->nullable();
			$table->string('prdimagefilename', 256)->nullable();
			$table->string('prdimagepath', 256)->nullable();
			$table->string('prdimageext', 256)->nullable();
			$table->unique(['companyID','prddetailid','prdid'], 'CI_PRDDETAIL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDDETAIL');
	}

}
