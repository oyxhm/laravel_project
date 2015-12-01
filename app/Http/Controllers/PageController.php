<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

	//
	public function about()
	{
		$name['first'] = 'xiao8';
		$name['last'] = 'yyf';
		return view('Pages.about',$name);
		//return $app->enviroment('local');
	}
}
