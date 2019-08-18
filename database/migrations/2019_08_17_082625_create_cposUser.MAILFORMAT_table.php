<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.MAILFORMATTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.MAILFORMAT', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('mailformatid', 256)->nullable();
			$table->string('formattitle', 256)->nullable();
			$table->string('notifykey', 256)->nullable();
			$table->string('subject', 256)->nullable();
			$table->string('email')->nullable();
			$table->string('sms')->nullable();
			$table->string('files')->nullable();
			$table->dateTime('deletedat')->nullable();
			$table->unique(['companyid','active','mailformatid'], 'CI_MAILFORMAT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.MAILFORMAT');
	}

}
