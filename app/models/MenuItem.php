<?php

class MenuItem extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'menu_id' => 'required',
		'name' => 'required',
		'description' => 'required',
		'price' => 'required',
		'picture_url' => 'required'
	);

  public function menu()
  {
    $this->belongsTo('Menu');
  }
}
