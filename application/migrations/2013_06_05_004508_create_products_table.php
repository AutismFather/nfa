<?php

class Create_Products_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		\Laravel\Database\Schema::create('products', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('category_id')->index();
			$table->string('name', 255);
			$table->string('slug', 255);
			$table->text('description');
			$table->string('sku', 255);
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
		\Laravel\Database\Schema::drop('products');
	}

}