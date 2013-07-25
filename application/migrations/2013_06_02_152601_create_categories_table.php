<?php

class Create_Categories_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		\Laravel\Database\Schema::create('categories', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name', 100);
			$table->string('slug', 150);
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
		\Laravel\Database\Schema::drop('categories');
	}

}