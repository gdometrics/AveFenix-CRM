<?php

use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status', function($table)
        {
        	$table->increments('id');
			$table->text('status');
			$table->text('comments')->nullable();
			$table->smallInteger('color');
			$table->integer('edition')->nullable();
			$table->integer('magazine')->nullable();
			$table->date('date');   
			$table->time('time');   
			$table->integer('id_user');   
			$table->integer('id_contact')->nullable();
			$table->integer('id_client'); 
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
		Schema::drop('status');
	}

}