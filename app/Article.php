<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//数据库表名
	protected $table = 'articles';

	protected $fillable=[
		'title',
		'body',
		'publish_at',
		'user_id',
		];

	protected $dates = ['publish_at'];

	public function setPublishAtAttribute($date)
	{
		//未来时间的0点
		$this->attributes['publish_at'] = Carbon::parse($date);
	}

	public function scopePublish($query)
	{
		$query->where('publish_at','<=',Carbon::now());
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	public function getTagListAttribute()
	{
		return $this->tags->lists('id');
	}


}
