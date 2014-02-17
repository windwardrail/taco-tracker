<?php

class MenuItemsController extends BaseController {

	/**
	 * Menu_item Repository
	 *
	 * @var Menu_item
	 */
	protected $menu_item;

	public function __construct(MenuItem $menu_item)
	{
		$this->menu_item = $menu_item;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menu_items = $this->menu_item->all();

		return View::make('menu_items.index', compact('menu_items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('menu_items.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, MenuItem::$rules);

		if ($validation->passes())
		{
			$this->menu_item->create($input);

			return Redirect::route('menu_items.index');
		}

		return Redirect::route('menu_items.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$menu_item = $this->menu_item->findOrFail($id);

		return View::make('menu_items.show', compact('menu_item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu_item = $this->menu_item->find($id);

		if (is_null($menu_item))
		{
			return Redirect::route('menu_items.index');
		}

		return View::make('menu_items.edit', compact('menu_item'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, MenuItem::$rules);

		if ($validation->passes())
		{
			$menu_item = $this->menu_item->find($id);
			$menu_item->update($input);

			return Redirect::route('menu_items.show', $id);
		}

		return Redirect::route('menu_items.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->menu_item->find($id)->delete();

		return Redirect::route('menu_items.index');
	}

}
