@extends('layouts.scaffold')

@section('main')

<h1>Trucks</h1>
  <ol>
    @foreach($locations as $location)
      <li>
        <ul>
          <li>Latitude: {{{ $location->latitude }}}</li>
          <li>Logitude: {{{ $location->longitude }}}</li>
          <li> {{ link_to_route('trucks.show', $location->truck->name, $location->truck->id) }} </li>

        </ul>
      </li>
    @endforeach
  </ol>