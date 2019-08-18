<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNBANNERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNBANNER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('bannerid', 256)->nullable();
			$table->string('bannername', 256)->nullable();
			$table->string('imagethumb', 256)->nullable();
			$table->string('imagefilename', 256)->nullable();
			$table->string('imagefilepath', 256)->nullable();
			$table->unique(['companyid','active','bannerid'], 'CI_CMNBANNER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNBANNER');
	}

}
