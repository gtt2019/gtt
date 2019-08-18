<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.UserAuthorizationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.User_Authorization', function(Blueprint $table)
		{
			$table->integer('Authorization_Id', true);
			$table->integer('User_Id');
			$table->boolean('User_Authorized')->nullable();
			$table->dateTime('Authorized_On')->nullable();
			$table->boolean('Is_Active')->nullable()->default(1);
			$table->integer('Created_By')->nullable();
			$table->timestamp('Created_On')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('Modified_By')->nullable();
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
		Schema::drop('cposUser.User_Authorization');
	}

}
