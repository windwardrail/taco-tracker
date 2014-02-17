<?php

class TrucksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('trucks')->truncate();

		$trucks = array(
        ['name' => 'Super Mario\'s', 'email' => 'mario@tacomail.com', 'blurb' => 'Getting hungry yet? Yes!'],
        ['name' => 'Diego\'s', 'email' => 'diego@tacomail.com', 'blurb' => 'Hmmm, a bit pricy.'],
        ['name' => 'Tapatio\'s Tacos', 'email' => 'mr_t@tacomail.com', 'blurb' => 'Everyone needs some vitamin T!'],
		);

		// Uncomment the below to run the seeder
    foreach ($trucks as $truck) {
      Truck::create($truck);
    }
	}

}
