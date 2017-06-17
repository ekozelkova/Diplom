<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Topic extends Model
{
    protected $table = 'topics';
    
    protected function levelKnowledges($professionId, $level)
    {			
		$result = 
			$this->belongsToMany(
			'App\Knowledge',
			'records',
			'topic',
			'knowledge')->
			wherePivot('profession', '=', $professionId)->
			wherePivot('level', '=', $level)->
			get()->
			unique();
		
		return $result;
	}
    
    public function knowledges($professionId)
    {
		$firstLevel = $this->levelKnowledges($professionId, 1);
			
		$secondLevel = $this->levelKnowledges($professionId, 2);
			
		$thirdLevel = $this->levelKnowledges($professionId, 3);
			
		$result = array();
		
		$i = 0;
		
		foreach($firstLevel as $knowledge)
		{
			$result[$i][0] = $knowledge;
			$i++;
		}
		
		$i = 0;
		
		foreach($secondLevel as $knowledge)
		{
			$result[$i][1] = $knowledge;
			$i++;
		}
		
		$i = 0;
		
		foreach($thirdLevel as $knowledge)
		{
			$result[$i][2] = $knowledge;
			$i++;
		}
		
		return $result;
	}
	
	public function subtopics($professionId)
	{
			
		$result = 
			$this->belongsToMany(
			'App\Subtopic',
			'records',
			'topic',
			'subtopic')->
			get()->
			unique();
			
		return $result;
	}
	
	public function block()
	{
		return $this->belongsTo('App\Block', 'block')->first();
	}
}
