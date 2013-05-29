<?php

class Create_User_Groups_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_groups', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name', '255');
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
		Schema::drop('user_groups');
	}

}