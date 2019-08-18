<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.PermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.Permission', function(Blueprint $table)
		{
			$table->integer('Permission_id', true);
			$table->string('Permission', 30);
			$table->string('Permission_desc')->nullable();
			$table->boolean('Is_Active')->nullable()->default(1);
			$table->timestamp('Created_On')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('Modified_On')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cposUser.Permission');
	}

}
