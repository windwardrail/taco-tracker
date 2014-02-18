<?php

class MenuItem extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'menu_id' => 'required',
		'name' => 'required',
		'price' => 'required'
	);

  public function menu()
  {
    $this->belongsTo('Menu');
  }
}
