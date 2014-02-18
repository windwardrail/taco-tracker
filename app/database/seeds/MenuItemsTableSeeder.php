<?php

class MenuItemsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('menu_items')->truncate();

		$menu_items = array(
      ['name' => 'Taco al pastor', 'price' => 1.50, 'description' => 'My personal favorite...', 'menu_id' => 1],
      ['name' => 'Super Burrito', 'price' => 6.0, 'description' => 'Get this one with steak if you are hungry.', 'menu_id' => 1],
      ['name' => 'Papusas', 'price' => '1.0', 'description' => "These are probably great, but just gimme a taco!", 'menu_id' => 1]
		);

		// Uncomment the below to run the seeder
    foreach ($menu_items as $item) {
      MenuItem::create($item);
    }
	}

}
