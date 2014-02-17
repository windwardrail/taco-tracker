<?php

class MenusController extends BaseController {

	/**
	 * Menus Repository
	 *
	 * @var Menus
	 */
	protected $menu;

	public function __construct(Menu $menu)
	{
		$this->menu = $menu;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menus = $this->menu->all();

		return View::make('menus.index', compact('menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Menu::$rules);

		if ($validation->passes())
		{
			$this->menu->create($input);

			return Redirect::route('menus.index');
		}

		return Redirect::route('menus.create')
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
		$menu = $this->menu->findOrFail($id);

		return View::make('menus.show', compact('menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu = $this->menu->find($id);

		if (is_null($menu))
		{
			return Redirect::route('menus.index');
		}

		return View::make('menus.edit', compact('menu'));
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
		$validation = Validator::make($input, Menu::$rules);

		if ($validation->passes())
		{
			$menu = $this->menu->find($id);
			$menu->update($input);

			return Redirect::route('menus.show', $id);
		}

		return Redirect::route('menus.edit', $id)
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
		$this->menu->find($id)->delete();

		return Redirect::route('menus.index');
	}

}
