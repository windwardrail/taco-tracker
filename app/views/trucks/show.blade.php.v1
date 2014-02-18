@extends('layouts.scaffold')

@section('main')

<h1>Show Truck</h1>

<p>{{ link_to_route('trucks.index', 'Return to all trucks') }}</p>

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
		<tr>
			<td>{{{ $truck->name }}}</td>
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
	</tbody>
</table>

@stop
