<?php namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticleController extends Controller {

	//
	public function __construct()
	{
		// $this->middleware('auth',['only' => 'create']);
	}

	public function index()
	{
		// $articles = Article::all();
		// 倒序获取文章
		// $articles = Article::orderBy('publish_at','desc')->get();
		// $articles = Article::latest('publish_at')->publish()->get();
		// 不获取超过当前时间的文章 没用mutators
		// $articles = Article::latest('publish_at')->where('publish_at','>=',Carbon::now())->get();
		// 涌scope
		$articles = Article::latest('publish_at')->publish()->get();
		// $user = \Auth::user();
		// $articles = $user->articles;
		return view('article.index',compact('articles'));
		//return view('article.index')->with('articles',$articles);
	}

	public function show($id)
	{
		$article = Article::findOrFail($id);
		//dd($article->publish_at->diffForHumans());
		return view('article.show')->with('q',$article);
	}

	public function create()
	{
		return view('article.create');
	}

	public function test()
	{
		$user = User::find(2);
		$articles = $user->articles;
		return view('article.test',compact('articles'));
	}

	public function store(ArticleRequest $request)
	{
		// $input = Request::all();
		// $input['publish_at'] = Carbon::now();
		// $this->validate($request,['title' => 'required|min:3','body'=>'required','publish_at' => 'required|date']);
		$article = new Article($request->all());
		\Auth::user()->articles()->save($article);
		return redirect('article');
		// return $input;
	}

	public function edit($id)
	{
		$article = Article::findOrFail($id);
		return view('article.edit',compact('article'));
	}

	public function update($id,ArticleRequest $request)
	{
		$article = Article::findOrFail($id);
		$article->update($request->all());
		return redirect('article');
	}
}
