<?php

class Menu extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'truck_id' => 'required'
	);
}
