<?php namespace App\Http\Controllers;

use App\Albums;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class GalleryController extends Controller
{
	public function __construct()
	{

		$this->middleware('auth');

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$almums = Albums::all();
		return view('admin.showAlbums',array('albums'=>$almums));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('admin.addGallery');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$album_name = Input::get('name');
		$image = Input::file('image');
		$images = Input::file('images');

		$destinationPath = "uploadfiles/albums/" . $album_name;

		if (!file_exists($destinationPath)) {
			mkdir($destinationPath);
		}

		if (!empty($image)) {

			$image_name = $image->getClientOriginalName();

			if ($image->move($destinationPath, $image_name)) {
				$album = new Albums;
				$album->name = $album_name;
				$album->image = $image_name;
				$album->save();
			}

		}

		if (!empty($images)) {

			foreach ($images as $album_image) {

				$album_image_name = $album_image->getClientOriginalName();

				if ($album_image->move($destinationPath, $album_image_name)) {
					Pictures::add_pics_to_album($album->id, $album_image_name);
				}
			}
		}
		return redirect('/gallery');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function delete_album($id)
	{

		$album = Albums::find($id);
		$album->delete();
		array_map('unlink', glob("uploadfiles/albums/" .$album->name . "/*"));
//		unlink("uploadfiles/albums/" . $album->name);
		rmdir("uploadfiles/albums/" . $album->name);
	}

	public function images_of_album($id){

		$images = Albums::find($id)->pictures;
		$album = Albums::find($id);
		$album_name = $album->name;
		return view('admin.albumImages',array('images'=>$images,'album_name'=>$album_name));
	}

	public function update_image_of_album($id){

		$picture = Pictures::find($id);
		$album = Albums::where('id','=',$picture->album_id)->first();
		$album_name =$album->name;

		$image = Input::file('image');

		$destinationPath = "uploadfiles/albums/" .$album_name;

		if (!empty($image)) {
			unlink($destinationPath . "/" . $picture->images);
			$image_name = $image->getClientOriginalName();
			if ($image->move($destinationPath, $image_name)) {

				Pictures::edit_pic_to_album($id,$album->id,$image_name);
			}

		} else {
			$image_name = $picture->images;
			Pictures::edit_pic_to_album($id,$album->id,$image_name);
		}
		return redirect('images_of_album/'.$album->id);

	}
	public function delete_image_of_album($id){

		$picture = Pictures::find($id);
		$album = Albums::where('id','=',$picture->album_id)->first();
		$picture->delete();
//		array_map('unlink', glob("uploadfiles/albums/" .$album->name . "/*"));
		unlink("uploadfiles/albums/" . $album->name."/".$picture->images);

	}

	public function update_album($id)
	{

		$album = Albums::find($id);
		$album_name = Input::get('name');
		$image = Input::file('image');

		if ($album_name !== $album->name) {

			rename("uploadfiles/albums/" . $album->name, "uploadfiles/albums/" . $album_name);
			$destinationPath = "uploadfiles/albums/" . $album_name;

		} else {

			$destinationPath = "uploadfiles/albums/" . $album->name;
		}
		if (!empty($image)) {
			unlink($destinationPath . "/" . $album->image);
			$image_name = $image->getClientOriginalName();
			if ($image->move($destinationPath, $image_name)) {

				Albums::edit_album($id, $album_name, $image_name);
			}

		} else {
			$image_name = $album->image;
			Albums::edit_album($id, $album_name, $image_name);
		}
		return redirect('/gallery');

	}

	public function add_image_to_album($id){

		$album_name = Albums::find($id)->first()->name;
		$destinationPath = "uploadfiles/albums/" . $album_name;

		$image = Input::file('image');
		if (!empty($image)) {
			$image_name = $image->getClientOriginalName();
			if ($image->move($destinationPath, $image_name)) {
				Pictures::add_pics_to_album($id,$image_name);
			}
		}
		return redirect('/images_of_album/'.$id);
	}
}
