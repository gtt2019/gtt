<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.AuditTrailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.Audit_Trail', function(Blueprint $table)
		{
			$table->integer('Audit_id', true);
			$table->string('Table_name', 50);
			$table->string('Field_Name', 50);
			$table->integer('Record_Id');
			$table->string('Old_Value')->nullable();
			$table->string('New_Value')->nullable();
			$table->integer('Changed_By')->nullable();
			$table->timestamp('Changed_On')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.Audit_Trail');
	}

}
