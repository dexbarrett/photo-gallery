<?php

class AlbumController extends \BaseController {

    public function index()
    {
        $albums = Album::with('photos')->get();

        return View::make('album.index')
            ->with(compact('albums'));  
    }

    public function create()
    {
        return View::make('album.create');
    }

    public function store()
    {
        $rules = array(
            'name'        => 'required',
            'cover_image' => 'required|image'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('album.create')
                ->withInput()
                ->withErrors($validator);
        }

        $file            = Input::file('cover_image');
        $randomName      = Str::random(8);
        $destinationPath = 'albums';
        $extension       = $file->getClientOriginalExtension();
        $fileName        = $randomName . '_cover.' . $extension;
        $uploadSuccess   = $file->move($destinationPath, $fileName);

        $album = Album::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'cover_image' => $fileName
        ));

        return Redirect::route('album.show', array('id' => $album->id));
    }

    public function show($id)
    {
        $album = Album::with('photos')->find($id);
        $albums = Album::where('id','!=', $id)->get();

        return View::make('album.show')
            ->with(compact('album', 'albums'));
    }

   
    public function destroy($id)
    {
        $album = Album::find($id);

        File::delete('albums/' . $album->cover_image);

        $album->delete();

        return Redirect::route('album.index');
    }

}