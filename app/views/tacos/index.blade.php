@extends('layouts.scaffold')

@section('main')
  <div id="map-canvas"></div>
  <script>
    var truck_locations = [];
  </script>
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

  {{ HTML::script('javascripts/tacos.js') }}

@stop