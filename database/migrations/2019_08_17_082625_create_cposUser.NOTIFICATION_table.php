<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.NOTIFICATIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.NOTIFICATION', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('notificationid', 256)->nullable();
			$table->string('usertype', 256)->nullable();
			$table->string('typeid', 256)->nullable();
			$table->string('title', 256)->nullable();
			$table->string('msg')->nullable();
			$table->string('imagefilename', 256)->nullable();
			$table->string('imagefilepath', 256)->nullable();
			$table->dateTime('deletedat')->nullable();
			$table->unique(['companyid','active','notificationid','typeid'], 'CI_NOTIFICATION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.NOTIFICATION');
	}

}
