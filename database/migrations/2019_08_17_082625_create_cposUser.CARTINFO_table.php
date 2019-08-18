<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CARTINFOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CARTINFO', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('cartid', 256)->nullable();
			$table->string('userid', 256)->nullable();
			$table->string('prdid', 256)->nullable();
			$table->decimal('qty', 19, 4)->nullable();
			$table->decimal('price', 19, 4)->nullable();
			$table->dateTime('deletedat')->nullable();
			$table->unique(['companyid','active','cartid'], 'CI_CARTINFO');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CARTINFO');
	}

}
