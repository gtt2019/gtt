<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.CMNSEQUENCETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.CMNSEQUENCE', function(Blueprint $table)
		{
			$table->string('tablename', 256)->nullable()->unique('CI_CMNSEQUENCE');
			$table->integer('seq')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.CMNSEQUENCE');
	}

}
