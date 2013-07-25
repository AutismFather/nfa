<?php

class Create_Options_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		\Laravel\Database\Schema::create('options', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name', 100);
			$table->text('values');
			$table->decimal('price', 11, 2);
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		\Laravel\Database\Schema::drop('options');
	}

}