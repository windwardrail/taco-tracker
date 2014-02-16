@extends('layouts.scaffold')

@section('main')

<h1>Edit Truck</h1>
{{ Form::model($truck, array('method' => 'PATCH', 'route' => array('trucks.update', $truck->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('logo_url', 'Logo_url:') }}
            {{ Form::text('logo_url') }}
        </li>

        <li>
            {{ Form::label('picture_url', 'Picture_url:') }}
            {{ Form::text('picture_url') }}
        </li>

        <li>
            {{ Form::label('blurb', 'Blurb:') }}
            {{ Form::textarea('blurb') }}
        </li>

        <li>
            {{ Form::label('website_url', 'Website_url:') }}
            {{ Form::text('website_url') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('trucks.show', 'Cancel', $truck->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
