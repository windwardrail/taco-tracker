@extends('layouts.scaffold')

@section('main')

<h1>All Menu_items</h1>

<p>{{ link_to_route('menu_items.create', 'Add new menu_item') }}</p>

@if ($menu_items->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Menu_id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Picture_url</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($menu_items as $menu_item)
				<tr>
					<td>{{{ $menu_item->menu_id }}}</td>
					<td>{{{ $menu_item->name }}}</td>
					<td>{{{ $menu_item->description }}}</td>
					<td>{{{ $menu_item->price }}}</td>
					<td>{{{ $menu_item->picture_url }}}</td>
                    <td>{{ link_to_route('menu_items.edit', 'Edit', array($menu_item->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('menu_items.destroy', $menu_item->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no menu_items
@endif

@stop
