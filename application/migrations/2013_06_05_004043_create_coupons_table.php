<?php

class Create_Coupons_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		\Laravel\Database\Schema::create('coupons', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('code', 50);
			$table->integer('uses');
			$table->integer('used');
			$table->date('validuntil');
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
		\Laravel\Database\Schema::drop('coupons');
	}

}