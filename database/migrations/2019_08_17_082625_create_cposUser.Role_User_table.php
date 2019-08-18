<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.RoleUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.Role_User', function(Blueprint $table)
		{
			$table->integer('Role_User_Id', true);
			$table->integer('Role_Id');
			$table->integer('User_Id');
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
		Schema::drop('cposUser.Role_User');
	}

}
