@extends('layouts.radar')

@section('main')

  <!-- map gets injected here -->
  <div id="map-canvas"></div>

  <img src="{{ asset('images/radar_overlay.png') }}" alt="" id="radar_overlay">
  <img src="{{ asset('images/sweep.png') }}" alt="" id="sweep">

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
  {{ HTML::script('javascripts/jquery.rotate-0.3.0/jquery.rotate.js') }}
  {{ HTML::script('javascripts/tacos.js') }}

@stop