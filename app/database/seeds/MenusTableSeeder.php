<?php

class MenusTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('menus')->truncate();

		$menus = array(
       ['truck_id' => 1, 'id' => 1]
		);

		// Uncomment the below to run the seeder
		foreach ($menus as $menu) {
      Menu::create($menu);
    }
	}

}
