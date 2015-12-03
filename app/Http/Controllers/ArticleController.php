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
		$this->middleware('auth',['except' => ['index','show']]);
	}

	public function index()
	{
		// $articles = Article::all();
		// 倒序获取文章
		// $articles = Article::orderBy('publish_at','desc')->get();
		// $articles = Article::latest('publish_at')->publish()->get();
		// 不获取超过当前时间的文章 没用mutators
		// $articles = Article::latest('publish_at')->where('publish_at','>=',Carbon::now())->get();
		// 用scope
		// $user = \Auth::user();
		// $articles = $user->articles;
		$articles = Article::latest('publish_at')->publish()->get();
		return view('article.index',compact('articles'));
		//return view('article.index')->with('articles',$articles);
	}

	public function show(Article $article)
	{
		// dd($id);# 返回文章
		// $article = Article::findOrFail($id);
		//dd($article->publish_at->diffForHumans());
		return view('article.show',compact('article'));
	}

	public function create()
	{
		$tags = \App\Tag::lists('name','id');
		return view('article.create',compact('tags'));
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
		// $article = new Article($request->all());
		// \Session::flash('flash_message','文章发布成功');
		// \Session::flash('flash_message_important',true);
		// dd($request->input('tags'));
		// $article = \Auth::user()->articles()->create($request->all());
		// $article->syncTags($request->input('tag_list'));
		$this->createArticle($request);
		flash('文章发布成功');
		// flash()->success('文章发布成功');
		return redirect('article');
		/*->with([
			'flash_message' => '文章发布成功',
			'flash_message_important' => true,
			]);*/
		// return $input;
	}

	public function edit(Article $article)
	{
		// $article = Article::findOrFail($id);
		$tags = \App\Tag::lists('name','id');
		return view('article.edit',compact('article','tags'));
	}

	public function update(Article $article,ArticleRequest $request)
	{
		// $article = Article::findOrFail($id);
		$article->update($request->all());
		$this->syncTags($article,$request->input('tag_list'));
		return redirect('article');
	}

	private function syncTags(Article $article, array $tags)
	{
		$article->tags()->sync($tags);
	}

	public function createArticle(ArticleRequest $request)
	{
		$article = \Auth::user()->articles()->create($request->all());
		$this->syncTags($article,$request->input('tag_list'));
		return $article;
	}
}
