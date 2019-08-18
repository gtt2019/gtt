<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.NOTIFICATIONTYPETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.NOTIFICATIONTYPE', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('typeid', 256)->nullable();
			$table->string('type', 256)->nullable();
			$table->dateTime('deletedat')->nullable();
			$table->unique(['companyid','active','typeid'], 'CI_NOTIFICATIONTYPE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.NOTIFICATIONTYPE');
	}

}
