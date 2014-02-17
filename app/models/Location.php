<?php

class Location extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
    'truck_id' => 'required',
    'latitude' => 'required',
    'logitude' => 'required'
   );

  public function truck()
  {
    return $this->belongsTo('Truck');
  }

}
