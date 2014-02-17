<?php

class LocationTableSeeder extends Seeder {

  public function run()
  {
    // Uncomment the below to wipe the table clean before populating
    DB::table('locations')->truncate();

    $locations = array(
        ['latitude' => '48.749543', 'longitude' => '-122.473016', 'truck_id' => 1],
        ['latitude' => '48.760250', 'longitude' => '-122.464707', 'truck_id' => 2],
        ['latitude' => '48.766770', 'longitude' => '-122.485810', 'truck_id' => 3]
    );

    // Uncomment the below to run the seeder
    foreach ($locations as $location) {
      Location::create($location);
    }
  }

}