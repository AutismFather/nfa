<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_groups_id')->index();
			$table->string('firstname', 100);
			$table->string('lastname', 100);
			$table->string('email', 100)->unique();
			$table->string('username', 20)->unique();
			$table->string('password', 50);
			$table->timestamps();
			$table->foreign('group_id')->references('id')->on('user_groups');
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
		Schema::drop('users');
	}

}