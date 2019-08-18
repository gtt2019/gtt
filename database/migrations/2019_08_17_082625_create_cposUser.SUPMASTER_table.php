<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.SUPMASTERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.SUPMASTER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastupdated')->nullable();
			$table->string('supid', 256)->nullable();
			$table->string('suptypeid', 256)->nullable();
			$table->string('supname', 256)->nullable();
			$table->string('supaltid', 256)->nullable();
			$table->string('suptaxid', 256)->nullable();
			$table->string('supnote', 512)->nullable();
			$table->decimal('supdiscount', 19, 4)->nullable();
			$table->decimal('supminorderqty', 19, 4)->nullable();
			$table->decimal('supminorderamt', 19, 4)->nullable();
			$table->decimal('suptaxrate', 19, 4)->nullable();
			$table->unique(['companyid','active','supid'], 'CI_SUPMASTER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.SUPMASTER');
	}

}
