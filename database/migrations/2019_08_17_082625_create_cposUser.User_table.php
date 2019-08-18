<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.User', function(Blueprint $table)
		{
			$table->integer('User_id', true);
			$table->string('Username', 30);
			$table->string('Password');
			$table->string('Email', 100)->unique('UK_Email');
			$table->string('Mobile', 10)->nullable()->unique('UK_Mobile');
			$table->string('First_Name', 100)->nullable();
			$table->string('Last_Name', 100)->nullable();
			$table->integer('Token_Id')->nullable();
			$table->string('Remember_Token', 100)->nullable();
			$table->boolean('Is_Authenticated')->nullable();
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
		Schema::drop('cposUser.User');
	}

}
