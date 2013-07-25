<?php

class Create_Features_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		\Laravel\Database\Schema::create('features', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('product_id')->index();
			$table->date('datestart');
			$table->date('dateend');
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
		\Laravel\Database\Schema::drop('features');
	}

}