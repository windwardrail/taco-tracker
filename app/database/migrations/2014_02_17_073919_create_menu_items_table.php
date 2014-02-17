<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('menu_id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->decimal('price', 4, 2);
			$table->string('picture_url')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_items');
	}

}
