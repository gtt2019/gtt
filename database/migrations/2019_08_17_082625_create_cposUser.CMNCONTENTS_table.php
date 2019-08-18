<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNCONTENTSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNCONTENTS', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('contentid', 256)->nullable();
			$table->string('contenttitle', 256)->nullable();
			$table->string('contenttype', 256)->nullable();
			$table->string('typeofcontent', 256)->nullable();
			$table->string('content', 256)->nullable();
			$table->unique(['companyid','active','contentid'], 'CI_CMNCONTENTS');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNCONTENTS');
	}

}
