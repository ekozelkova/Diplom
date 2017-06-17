<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'professions';
    
    public function euSourceStandard()
    {
		return $this->belongsTo('App\Standard', 'euSourceStandard')->first();
	}
	
	public function ruSourceStandard()
    {
		return $this->belongsTo('App\Standard', 'ruSourceStandard')->first();
	}
	
	public function blocks()
	{	
		$topics = 
			$this->belongsToMany(
			'App\Topic',
			'records',
			'profession',
			'topic')->
			get();
		
		$result = collect();
		
		foreach($topics as $topic)
		{
			$result->push($topic->block());
		}
		
		return $result->unique();
	}
	
	public function lowLevelTopics()
	{		
		$result = 
			$this->belongsToMany(
			'App\Topic',
			'records',
			'profession',
			'topic')->
			wherePivot('level', '<', 4)->
			get()->
			unique();
			
		return $result;
	}
	
	public function highLevelTopics()
	{
		$result = 
			$this->belongsToMany(
			'App\Topic',
			'records',
			'profession',
			'topic')->
			wherePivot('level', '>', 3)->
			get()->
			unique();
			
		return $result;
	}
}
