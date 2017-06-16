<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Subtopic extends Model
{
    protected $table = 'subtopics';
    
    public function knowledges($professionId, $topicId, $levelId)
    {
		$knowledges_ids = DB::table('records')->
			where('profession', '=', $professionId)->
			where('topic', '=', $topicId)->
			where('subtopic', '=', $this->id)->
			where('level', '=', $levelId)->
			groupBy('knowledge')->
			pluck('knowledge');

		return Knowledge::find($knowledges_ids);
	}
}
