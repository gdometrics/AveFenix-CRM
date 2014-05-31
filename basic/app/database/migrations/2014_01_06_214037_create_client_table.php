<?php

use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client', function($table)
        {
        	$table->increments('id');
			$table->string('name', 60);
			$table->string('razonsocial', 255);
			$table->string('business', 255);
			$table->string('address1', 255);
			$table->string('address2', 255)->nullable();
			$table->string('phone1', 64);
			$table->string('phone2', 64)->nullable();
			$table->string('rif', 15)->unique()->nullable();
			$table->string('webpage', 255)->nullable(); 
			$table->string('email', 255)->nullable();
			$table->string('photo', 255)->default('default2.png'); 
			$table->integer('id_user');
			$table->integer('id_parent')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client');
	}

}