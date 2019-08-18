<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USRUSERTYPETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USRUSERTYPE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('usrtypeid', 256)->nullable();
			$table->string('usrtype', 256)->nullable();
			$table->string('usrdesc', 256)->nullable();
			$table->string('usruserdesc', 256)->nullable();
			$table->unique(['companyid','active','usrtypeid'], 'CI_USRUSERTYPE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USRUSERTYPE');
	}

}
