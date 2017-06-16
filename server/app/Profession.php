<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profession extends Model
{
    protected $table = 'professions';
    
    public function euSourceStandard()
    {
		return Standard::find($this->euSourceStandard);
	}
	
	public function ruSourceStandard()
    {
		return Standard::find($this->ruSourceStandard);
	}
	
	public function blocks()
	{
		$blocks_ids = DB::table('records')->
			select('blocks.id as id')->
			where('records.profession', '=', $this->id)->
			join('topics', 'topics.id', '=', 'records.topic')->
			join('blocks', 'blocks.id', '=', 'topics.block')->
			groupBy('blocks.id')->
			pluck('id');
		
		return Block::find($blocks_ids);
	}
	
	public function lowLevelTopics()
	{
		$topics_ids = DB::table('records')->
			where('profession', '=', $this->id)->
			where('level', '<', 4)->
			groupBy('topic')->
			pluck('topic');
			
		return Topic::find($topics_ids);
	}
	
	public function highLevelTopics()
	{
		$topics_ids = DB::table('records')->
			where('profession', '=', $this->id)->
			where('level', '>', 3)->
			groupBy('topic')->
			pluck('topic');
			
		return Topic::find($topics_ids);
	}
}
