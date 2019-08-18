<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.IMPORTCOUNTRYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.IMPORTCOUNTRY', function(Blueprint $table)
		{
			$table->integer('batchid')->nullable();
			$table->integer('seqnum')->nullable();
			$table->string('countryname', 256)->nullable();
			$table->string('countrycode', 256)->nullable();
			$table->string('isocode', 256)->nullable();
			$table->string('userdesc', 256)->nullable();
			$table->char('isimported', 1)->nullable();
			$table->string('batchnote', 256)->nullable();
			$table->index(['batchid','seqnum','isimported'], 'CI_IMPORTCOUNTRY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.IMPORTCOUNTRY');
	}

}
