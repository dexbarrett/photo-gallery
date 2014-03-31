<?php

class AlbumController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $albums = Album::with('photos')->get();

        return View::make('album.index')
            ->with(compact('albums'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $album = Album::with('photos')->find($id);
        $albums = Album::where('id','!=', $id)->get();

        return View::make('album.show')
            ->with(compact('album', 'albums'));
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
        $album = Album::find($id);

        File::delete('albums/' . $album->cover_image);

        $album->delete();

        return Redirect::route('album.index');
    }

}