@extends('layouts.scaffold')

@section('main')

<h1>All Trucks</h1>

<p>{{ link_to_route('trucks.create', 'Add new truck') }}</p>

@if ($trucks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Logo_url</th>
				<th>Picture_url</th>
				<th>Blurb</th>
				<th>Website_url</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($trucks as $truck)
				<tr>
					<td>{{ link_to_route('trucks.show', $truck->name, $truck->id) }}</td>
					<td>{{{ $truck->email }}}</td>
					<td>{{{ $truck->logo_url }}}</td>
					<td>{{{ $truck->picture_url }}}</td>
					<td>{{{ $truck->blurb }}}</td>
					<td>{{{ $truck->website_url }}}</td>
                    <td>{{ link_to_route('trucks.edit', 'Edit', array($truck->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('trucks.destroy', $truck->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no trucks
@endif

@stop
