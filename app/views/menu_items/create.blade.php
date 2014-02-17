@extends('layouts.scaffold')

@section('main')

<h1>Create Menu_item</h1>

{{ Form::open(array('route' => 'menu_items.store')) }}
	<ul>
        <li>
            {{ Form::label('menu_id', 'Menu_id:') }}
            {{ Form::input('number', 'menu_id') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price') }}
        </li>

        <li>
            {{ Form::label('picture_url', 'Picture_url:') }}
            {{ Form::text('picture_url') }}
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


