<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.ORDERMASTERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.ORDERMASTER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('orderid', 256)->nullable();
			$table->string('orderno', 256)->nullable();
			$table->string('statusid', 256)->nullable();
			$table->string('customerid', 256)->nullable();
			$table->string('employeeid', 256)->nullable();
			$table->string('storeid', 256)->nullable();
			$table->dateTime('ordersdate')->nullable();
			$table->dateTime('expecteddelivery')->nullable();
			$table->string('externalref', 256)->nullable();
			$table->string('orderarea', 256)->nullable();
			$table->string('orderdesc', 512)->nullable();
			$table->decimal('totalamtwithtax', 19, 4)->nullable();
			$table->decimal('totalamtwithouttax', 19, 4)->nullable();
			$table->decimal('totaldiscount', 19, 4)->nullable();
			$table->unique(['companyid','active','orderid','storeid'], 'CI_ORDERMASTER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.ORDERMASTER');
	}

}
