<?php

class ImageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$album = Album::find($id);

		return View::make('album.addimage')
			->with(compact('album'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'album_id' => 'required|numeric|exists:albums,id',
			'image'    => 'required|image'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('add_image', array('id' => Input::get('album_id')))
				->withInput()
				->withErrors($validator);
		}

		$file            = Input::file('image');
		$randomName      = Str::random(8);
		$destinationPath = 'albums';
		$extension       = $file->getClientOriginalExtension();
		$fileName        = $randomName . '_album_image.' . $extension;

		$file->move($destinationPath, $fileName);

		$image = Image::create(array(
			'description' => Input::get('description'),
			'image'       => $fileName,
			'album_id'    => Input::get('album_id')
		));

		return Redirect::route('album.show', array('id' => Input::get('album_id')));
	}

	public function move($id)
	{
		$rules = array(
			'new_album' => 'required|numeric|exists:albums,id',
			'photo'     => 'required|numeric|exists:images,id'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back();
		}

		$image = Image::find(Input::get('photo'));
		$image->album_id = Input::get('new_album');
		$image->save();

		return Redirect::route('album.show', array('id' => Input::get('new_album')));
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$photo = Image::find($id);
		File::delete('albums/' . $photo->image);
		$photo->delete();

		return Redirect::back();
	}

}