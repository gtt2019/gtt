<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.USERNOTIFICATIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.USERNOTIFICATION', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('usrnotificationid', 256)->nullable();
			$table->string('usertype', 256)->nullable();
			$table->string('userid', 256)->nullable();
			$table->string('orderid', 256)->nullable();
			$table->string('type', 256)->nullable();
			$table->string('title', 256)->nullable();
			$table->string('msg')->nullable();
			$table->string('filename', 256)->nullable();
			$table->char('seen', 3)->nullable();
			$table->dateTime('deletedat')->nullable();
			$table->unique(['companyid','active','usrnotificationid'], 'CI_USERNOTIFICATION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.USERNOTIFICATION');
	}

}
