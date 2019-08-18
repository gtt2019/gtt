<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNADDRESSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNADDRESS', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('addressid', 256)->nullable();
			$table->string('addresstype', 256)->nullable();
			$table->string('addresstypeid', 256)->nullable();
			$table->string('primaryaddress', 3)->nullable();
			$table->string('address1', 256)->nullable();
			$table->string('address2', 256)->nullable();
			$table->string('landmark', 256)->nullable();
			$table->string('locality', 256)->nullable();
			$table->string('city', 256)->nullable();
			$table->string('state', 256)->nullable();
			$table->string('postalcode', 256)->nullable();
			$table->string('country', 256)->nullable();
			$table->string('email', 256)->nullable();
			$table->string('homephone', 256)->nullable();
			$table->string('officephone', 256)->nullable();
			$table->string('mobile', 256)->nullable();
			$table->string('alternatenumber', 256)->nullable();
			$table->string('fax', 256)->nullable();
			$table->string('website', 256)->nullable();
			$table->unique(['companyid','active','addressid'], 'CI_CMNADDRESS');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNADDRESS');
	}

}
