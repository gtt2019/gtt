<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.SUPTYPETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.SUPTYPE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('suptypeid', 256)->nullable();
			$table->string('supdesc', 256)->nullable();
			$table->string('supuserdesc', 256)->nullable();
			$table->unique(['companyid','active','suptypeid'], 'CI_SUPTYPE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.SUPTYPE');
	}

}
