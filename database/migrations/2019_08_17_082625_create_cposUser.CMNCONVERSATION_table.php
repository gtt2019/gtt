<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNCONVERSATIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNCONVERSATION', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('msgid', 256)->nullable();
			$table->string('msgcategory', 256)->nullable();
			$table->string('senderid', 256)->nullable();
			$table->string('receiverid', 256)->nullable();
			$table->string('msg')->nullable();
			$table->char('msgreadstatus', 1)->nullable();
			$table->string('msgtype', 112)->nullable();
			$table->string('msgssendtatus', 256)->nullable();
			$table->string('msgsrecdtatus', 256)->nullable();
			$table->string('msgfilename', 256)->nullable();
			$table->string('msgfilepath', 256)->nullable();
			$table->dateTime('msgcreated')->nullable();
			$table->dateTime('msgread')->nullable();
			$table->unique(['companyid','active','msgid'], 'CI_CMNCONVERSATION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNCONVERSATION');
	}

}
