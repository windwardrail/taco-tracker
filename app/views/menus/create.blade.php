@extends('layouts.scaffold')

@section('main')

<h1>Create Menus</h1>

{{ Form::open(array('route' => 'menus.store')) }}
	<ul>
        <li>
            {{ Form::label('truck_id', 'Truck_id:') }}
            {{ Form::input('number', 'truck_id') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


