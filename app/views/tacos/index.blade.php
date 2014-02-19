@extends('layouts.radar')

@section('main')

  <!-- map gets injected here -->
  <div id="map-canvas"></div>

  <!-- initialize the variable to hold our locations -->
  <script>
    var truck_locations = [];
  </script>

  <!-- inject values from our model into javascript assignments -->
  @foreach ($locations as $location)
    <script>
    truck_locations.push({
      name: "{{ $location->truck->name }}",
      latitude: {{{ $location->latitude }}},
      longitude: {{{ $location->longitude }}},
      id: {{{ $location->truck->id }}}
    });
    </script>
  @endforeach

  <!-- script to display the map -->
  {{ HTML::script('javascripts/tacos.js') }}

@stop