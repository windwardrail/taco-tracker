@extends('layouts.scaffold')

@section('main')

<h1>All Menus</h1>

<p>{{ link_to_route('menus.create', 'Add new menu') }}</p>

@if ($menus->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Truck_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($menus as $menu)
				<tr>
					<td>{{{ $menu->truck_id }}}</td>
                    <td>{{ link_to_route('menus.edit', 'Edit', array($menu->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('menus.destroy', $menu->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no menus
@endif

@stop
