<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNCOMPANYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNCOMPANY', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('name', 256)->nullable();
			$table->string('website', 256)->nullable();
			$table->string('phone', 256)->nullable();
			$table->string('fax', 256)->nullable();
			$table->string('email', 256)->nullable();
			$table->string('contactperson', 256)->nullable();
			$table->string('address1', 512)->nullable();
			$table->string('address2', 512)->nullable();
			$table->string('city', 256)->nullable();
			$table->string('state', 256)->nullable();
			$table->string('zipcode', 256)->nullable();
			$table->string('country', 512)->nullable();
			$table->unique(['companyid','active'], 'CI_CMNCOMPANY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNCOMPANY');
	}

}
