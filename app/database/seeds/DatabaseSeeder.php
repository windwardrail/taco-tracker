<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('TrucksTableSeeder');
		$this->call('MenusTableSeeder');
		$this->call('Menu_itemsTableSeeder');
		$this->call('LocationTableSeeder');
	}

}