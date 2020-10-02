<?php

namespace App\Http\Controllers;
use App\Article;

class ArticleController extends Controller {
	//
	public function index() {
		// $data = [["id" => 1, "title" => "first Article"],
		// 	["id" => 2, "title" => "second Article"]];
		//select all from database
		//$data = Article::all();
		# code...

		$data=Article::latest()->paginate(5);
		return view('articles.index', ['articles' => $data]);
	}
	public function detail($id) {
		# code...
		//return "Controller Article Detail $id";
		$data=Article::find($id);
		return view('articles.detail',['article'=>$data]);
    }
    public function add()
    {
        # code...
        $data=[["id"=>1,"name"=>"News"],["id"=>2,"name"=>"Tech"]];
        return view('articles.add',['categories'=>$data]);
    }
    public function create()
    {
        $validator=validator(request()->all(),['title'=>'required','body'=>'required','category_id'=>'required']);
        if ($validator->fails()) {
            # code...
            return back()->withErrors($validator);
        }
        # code...
        $article=new Article();
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;

        $article->save();
        return redirect('/articles');

    }
    public function delete($id)
    {
        # code...
        $article=Article::find($id);
        $article->delete();
        return redirect('/articles')->with('info','Article deleted');
    }


}
