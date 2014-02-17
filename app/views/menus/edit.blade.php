@extends('layouts.scaffold')

@section('main')

<h1>Edit Menus</h1>
{{ Form::model($menu, array('method' => 'PATCH', 'route' => array('menus.update', $menu->id))) }}
	<ul>
        <li>
            {{ Form::label('truck_id', 'Truck_id:') }}
            {{ Form::input('number', 'truck_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('menus.show', 'Cancel', $menu->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
