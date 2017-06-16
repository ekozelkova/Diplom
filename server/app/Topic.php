<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Topic extends Model
{
    protected $table = 'topics';
    
    public function knowledges($professionId)
    {
		$firstLevel = DB::table('records')->
			select('knowledges.name as name', 'knowledges.id as id')->
			where('records.topic', '=', $this->id)->
			where('records.level', '=', 1)->
			where('records.profession', '=', $professionId)->
			join('knowledges', 'knowledges.id', '=', 'records.knowledge')->
			groupBy('knowledges.id')->
			get();
			
		$secondLevel = DB::table('records')->
			select('knowledges.name as name', 'knowledges.id as id')->
			where('records.topic', '=', $this->id)->
			where('records.level', '=', 2)->
			where('records.profession', '=', $professionId)->
			join('knowledges', 'knowledges.id', '=', 'records.knowledge')->
			groupBy('knowledges.id')->
			get();
			
		$thirdLevel = DB::table('records')->
			select('knowledges.name as name', 'knowledges.id as id')->
			where('records.topic', '=', $this->id)->
			where('records.level', '=', 3)->
			where('records.profession', '=', $professionId)->
			join('knowledges', 'knowledges.id', '=', 'records.knowledge')->
			groupBy('knowledges.id')->
			get();
			
		$result = array();
		
		$i = 0;
		
		foreach($firstLevel as $knowledge)
		{
			$result[$i][0] = $knowledge->name;
			$i++;
		}
		
		$i = 0;
		
		foreach($secondLevel as $knowledge)
		{
			$result[$i][1] = $knowledge->name;
			$i++;
		}
		
		$i = 0;
		
		foreach($thirdLevel as $knowledge)
		{
			$result[$i][2] = $knowledge->name;
			$i++;
		}
		
		return $result;
	}
	
	public function subtopics($professionId)
	{
		$subtopics_ids = DB::table('records')->
			where('profession', '=', $professionId)->
			where('topic', '=', $this->id)->
			groupBy('subtopic')->
			pluck('subtopic');
			
		return Subtopic::find($subtopics_ids);
	}
}
