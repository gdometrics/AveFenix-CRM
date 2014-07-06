<?php

use Illuminate\Database\Migrations\Migration;

class CreteMagazineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('magazine', function($table)
        {
        	$table->increments('id');
			$table->string('name',100);
			$table->string('photo', 255)->default('default3.png');
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
		Schema::drop('magazine');
	}

}