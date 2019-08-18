<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCposUser.WebAuthenticationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cposUser.Web_Authentication', function(Blueprint $table)
		{
			$table->integer('Web_Auth_Id', true);
			$table->string('Authentication_url');
			$table->integer('User_Id');
			$table->dateTime('URL_Created_On');
			$table->dateTime('URL_Expire_On');
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
		Schema::drop('cposUser.Web_Authentication');
	}

}
