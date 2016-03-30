<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller {

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
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.addArticle');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$title = Input::get('title');
		$subject = Input::get('description');
		$video_url = Input::get('vedio');
		$image = Input::file('image');

		if (!empty($video_url)) {

			Article::add_article($title, $subject, $video_url, "", "1");
			return redirect('/showVedios');
		} else {
			$destinationPath = "uploadfiles/articles/" . $title;
			if (!file_exists($destinationPath)) {
				mkdir("uploadfiles/articles/" . $title);
			}

			if (!empty($image)) {

				$image_name = $image->getClientOriginalName();
				if ($image->move($destinationPath, $image_name)) {

					Article::add_article($title, $subject, "", $image_name,"2");
				}
			}
			return redirect('/showArticles');
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
		//
	}

	public function delete_article($id){

		$article = Article::find($id);
		$article->comments()->delete();
		$article->delete();
		array_map('unlink', glob("uploadfiles/articles/" .$article->title . "/*"));
//		unlink("uploadfiles/albums/" . $album->name);
		rmdir("uploadfiles/articles/" . $article->title);

	}
	public function delete_vedio($id){

		$article = Article::find($id);
		$article->comments()->delete();
		$article->delete();

	}

	public function update_article($id){

		$article = Article::find($id);

		$title=Input::get('title');
		$subject=Input::get('description');
		$video_url=Input::get('vedio');
		$image=Input::file('image');

		if(!empty($video_url)){

			Article::edit_article($id,$title,$subject,$video_url,"","1");
			return redirect('/showVedios');
		}else{

			if($title !== $article->title){

				rename("uploadfiles/articles/".$article->title,"uploadfiles/articles/".$title);

				$destinationPath = "uploadfiles/articles/".$title;

			}else{

				$destinationPath = "uploadfiles/articles/".$article->title;

			}
			if(!empty($image)){
				unlink("uploadfiles/articles/".$article->title."/".$article->picture_url);

				$image_name = $image->getClientOriginalName();
				if($image->move($destinationPath, $image_name)){

					Article::edit_article($id,$title,$subject,"",$image_name,"2");
				}
			}else{
				Article::edit_article($id,$title,$subject,"",$article->picture_url,"2");
			}
			return redirect('/showArticles');
		}
	}

	public function doniana(){
		return view('admin.doniana');
	}
	public function create_vedio()
	{
		return view('admin.addVedio');
	}
	public function showArticles(){
		$articles = Article::where('type','=','2')->get();
		return View('admin.showArticles',array('articles'=>$articles));

	}
	public function showVedios(){

		$vedios = Article::where('type','=','1')->get();
		return View('admin.showVedio',array('vedios'=>$vedios));

	}

}
