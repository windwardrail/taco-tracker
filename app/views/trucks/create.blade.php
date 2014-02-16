@extends('layouts.scaffold')

@section('main')

<h1>Create Truck</h1>

{{ Form::open(array('route' => 'trucks.store')) }}
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


