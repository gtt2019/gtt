<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.SALESDETAILTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.SALESDETAIL', function(Blueprint $table)
		{
			$table->dateTime('lastupdated')->nullable();
			$table->string('detailid', 256)->nullable();
			$table->string('salesid', 256)->nullable();
			$table->string('registerid', 256)->nullable();
			$table->integer('sallineno')->nullable();
			$table->string('itembarcode', 256)->nullable();
			$table->integer('qty')->nullable();
			$table->decimal('unitprice', 19, 4)->nullable();
			$table->decimal('netamount', 19, 4)->nullable();
			$table->string('tax', 256)->nullable();
			$table->decimal('taxamount', 19, 4)->nullable();
			$table->decimal('linediscount', 19, 4)->nullable();
			$table->decimal('linetotal', 19, 4)->nullable();
			$table->string('linedesc', 512)->nullable();
			$table->unique(['detailid','salesid','registerid'], 'CI_SALESDETAIL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.SALESDETAIL');
	}

}
