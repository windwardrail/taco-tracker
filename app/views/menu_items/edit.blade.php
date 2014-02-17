@extends('layouts.scaffold')

@section('main')

<h1>Edit Menu_item</h1>
{{ Form::model($menu_item, array('method' => 'PATCH', 'route' => array('menu_items.update', $menu_item->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('menu_items.show', 'Cancel', $menu_item->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
