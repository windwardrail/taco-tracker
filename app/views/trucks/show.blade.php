@extends('layouts.scaffold')

@section('main')

<div class="row page-header">

  <div class="span1">
      <img src="{{  $truck->logo_url or asset('images/truck.svg') }}" alt="Logo">
  </div>

  <div class="span11">
    <h1>{{{ $truck->name }}}</h1>
  </div>

</div>



<div class="row">

  <div class="span6">
    <div class="well">
      <h1 class="text-center">Menu</h1>
      <hr>
      @if($truck->menu and $truck->menu->items)
        @include('menus.show', ['menu' => $truck->menu])
      @else
        <p>You'll just have to go see for yourself...</p>
      @endif
    </div>
  </div>

  <div class="span6">
    <img src="{{ $truck->picture_url or asset('images/truck.svg') }}" alt="Taco truck picture">
    <hr>
    <blockquote>
      <p class="text-warning">{{ $truck->blurb }}</p>
    </blockquote>
  </div>

</div>

@stop
