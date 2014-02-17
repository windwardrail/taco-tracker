<?php

class Menu extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'truck_id' => 'required'
	);

  public function menu_items()
  {
    return $this->hasMany('MenuItem');
  }

  public function truck()
  {
    return $this->belongsTo('Truck');
  }
}
