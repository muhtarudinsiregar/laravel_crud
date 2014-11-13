<?php

class ArtikelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$artikels = Artikel::paginate(5);
		$artikels = [
			'artikels' =>$artikels
		];
		return View::make('admin.dashboard', $artikels);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'title' =>'required',
			'isi' =>'required',
			'author' =>'required'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('artikel/create')->withErrors($validator)->withInput();
		}else{
			$artikels = new Artikel;
			$artikels->title = Input::get('title');
			$artikels->isi = Input::get('isi');
			$artikels->author = Input::get('author');
			$artikels->save();

			Session::flash('message', 'Data Berhasil Dimasukkan');
			return Redirect::to('artikel');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$artikelsbyid = Artikel::findOrFail($id);
		$artikelsbyid = [
			'artikelsbyid'=>$artikelsbyid
		];
		return View::make('admin.edit',$artikelsbyid);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
			'title' =>'required',
			'isi' =>'required',
			'author' =>'required'
		];

		$validator = Validator::make(Input::all(),$rules);
		
		if ($validator->fails()) {
			return Redirect::to('artikel/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$artikels = Artikel::findOrFail($id);
			$artikels->title = Input::get('title');
			$artikels->isi = Input::get('isi');
			$artikels->author = Input::get('author');
			$artikels->save();

			Session::flash('message','Data Berhasil Diubah');
			return Redirect::to('artikel');
		}


	}	



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$artikels = Artikel::findOrFail($id);
		$artikels->delete();
		Session::flash('message', 'Data Berhasil Dihapus');
		return Redirect::to('artikel');
	}


}
