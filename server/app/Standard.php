<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Standard extends Model
{
    protected $table = 'source_standards';
    
    public function knowledges($professionId = 0)
    {
		if($professionId > 0)
		{
			$result = DB::table('source_knowledge')->
				select('knowledges.name as name', 'knowledges.id as id')->
				where('source', '=', $this->id)->
				join('knowledges', 'knowledges.id', '=', 'source_knowledge.knowledge')->
				join('records', 'records.knowledge', '=', 'knowledges.id')->
				where('records.profession', '=', $professionId)->
				groupBy('knowledges.id')->
				get();
		}
		else
		{
			$result = DB::table('source_knowledge')->
				select('knowledges.name as name', 'knowledges.id as id')->
				where('source', '=', $this->id)->
				join('knowledges', 'knowledges.id', '=', 'source_knowledge.knowledge')->
				groupBy('knowledges.id')->
				get();
		}

		return $result;
	}
}
