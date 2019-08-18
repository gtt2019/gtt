<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNCONTACTUSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNCONTACTUS', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('contactusid', 256)->nullable();
			$table->string('contacttype', 256)->nullable();
			$table->string('contacttypeid', 256)->nullable();
			$table->string('name', 256)->nullable();
			$table->string('email', 256)->nullable();
			$table->string('phone', 256)->nullable();
			$table->string('subject', 256)->nullable();
			$table->string('msg')->nullable();
			$table->string('msgfilename', 256)->nullable();
			$table->string('msgfilepath', 256)->nullable();
			$table->unique(['companyid','active','contactusid'], 'CI_CMNCONTACTUS');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNCONTACTUS');
	}

}
