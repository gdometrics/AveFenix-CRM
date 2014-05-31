<?php

use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function($table)
        {
        	$table->increments('id');
			$table->string('firstname', 60);
			$table->string('lastname', 60)->nullable();
			$table->string('job', 255)->nullable();
			$table->string('department', 255)->nullable();
			$table->string('phone1', 64);
			$table->string('phone2', 64)->nullable(); 
			$table->string('email', 255)->nullable();
			$table->integer('id_client'); 
			$table->date('birthdate')->nullable(); 
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
		Schema::drop('contact');
	}

}