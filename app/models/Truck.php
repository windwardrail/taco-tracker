<?php

class Truck extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'email' => 'required|email',
		'logo_url' => 'url',
		'picture_url' => 'url',
		'website_url' => 'url'
	);

  public static $factory = array(
        'name' => 'string',
        'email' => 'email',
        'blurb' => 'text'
  );

  public function location()
  {
    return $this->hasOne('Location');
  }

  public function menu()
  {
    return $this->hasOne('Menu');
  }
}
