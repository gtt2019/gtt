<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PRDMASTERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.PRDMASTER', function(Blueprint $table)
		{
			$table->string('companyid', 256)->nullable();
			$table->char('active', 1)->nullable();
			$table->dateTime('lastUpdated')->nullable();
			$table->string('prdid', 256)->nullable();
			$table->string('prdsupid', 256)->nullable();
			$table->string('prdgridID', 256)->nullable();
			$table->string('uomid', 256)->nullable();
			$table->string('prdhrchy1id', 256)->nullable();
			$table->string('prdhrchy2id', 256)->nullable();
			$table->string('prdhrchy3id', 256)->nullable();
			$table->string('prdhrchy4id', 256)->nullable();
			$table->string('prdhrchy5id', 256)->nullable();
			$table->string('prdbarcode', 512)->nullable();
			$table->string('prdatr1id', 256)->nullable();
			$table->string('prdatr2id', 256)->nullable();
			$table->string('prdatr3id', 256)->nullable();
			$table->string('prdatr4id', 256)->nullable();
			$table->string('prdatr5id', 256)->nullable();
			$table->string('prdatr6id', 256)->nullable();
			$table->string('prdatr7id', 256)->nullable();
			$table->string('prdatr8id', 256)->nullable();
			$table->string('prdatr9id', 256)->nullable();
			$table->string('prdatr10id', 256)->nullable();
			$table->string('prdatr11id', 256)->nullable();
			$table->string('prdatr12id', 256)->nullable();
			$table->string('prdatr13id', 256)->nullable();
			$table->string('prdatr14id', 256)->nullable();
			$table->string('prdatr15id', 256)->nullable();
			$table->string('prdatr16id', 256)->nullable();
			$table->string('prdatr17id', 256)->nullable();
			$table->string('prdatr18id', 256)->nullable();
			$table->string('prdatr19id', 256)->nullable();
			$table->string('prdatr20id', 256)->nullable();
			$table->string('prdtaxcode', 256)->nullable();
			$table->string('prddesc', 256)->nullable();
			$table->string('prduserdesc', 256)->nullable();
			$table->string('prdfulldesc', 512)->nullable();
			$table->string('prdpriceoverride', 3)->nullable();
			$table->string('prdcommoverride', 3)->nullable();
			$table->smallInteger('prdreorderdays')->nullable();
			$table->string('prdautoreorder', 3)->nullable();
			$table->string('prdcalculatecost', 3)->nullable();
			$table->string('prdpriceby', 256)->nullable();
			$table->dateTime('prdqtyfirstrecd')->nullable();
			$table->integer('prdqtyonorder')->nullable();
			$table->integer('prdqtyonhand')->nullable();
			$table->unique(['companyid','active','prdid'], 'CI_PRDMASTER');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.PRDMASTER');
	}

}
