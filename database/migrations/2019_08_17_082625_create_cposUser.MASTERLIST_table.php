<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.MASTERLISTTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.MASTERLIST', function(Blueprint $table)
		{
			$table->string('tablename', 254);
			$table->char('tablecode', 6);
			$table->char('columnprefix', 6);
			$table->timestamp('enterdate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['tablename','tablecode','columnprefix'], 'CI_MASTERLIST');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.MASTERLIST');
	}

}
