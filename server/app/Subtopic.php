<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtopic extends Model
{
    protected $table = 'subtopics';
    
    public function knowledges($professionId, $topicId, $levelId)
    {	
		$result = 
			$this->belongsToMany(
			'App\Knowledge',
			'records',
			'subtopic',
			'knowledge')->
			wherePivot('profession', '=', $professionId)->
			wherePivot('topic', '=', $topicId)->
			wherePivot('level', '=', $levelId)->
			get()->
			unique();
			
		return $result;
	}
}
