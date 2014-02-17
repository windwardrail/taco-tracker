@extends('layouts.scaffold')

@section('main')

<h1>Show Menu_item</h1>

<p>{{ link_to_route('menu_items.index', 'Return to all menu_items') }}</p>

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
	</tbody>
</table>

@stop
