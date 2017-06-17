<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'source_standards';
    
    public function knowledges($professionId)
    {
		$knowledgesIds = Record::where('profession', '=', $professionId)->
			pluck('knowledge');
	
		$result = $this->belongsToMany(
			'App\Knowledge', 
			'source_knowledge', 
			'source',
			'knowledge')->
			whereIn('id', $knowledgesIds)->
			get()->
			unique();
		
		return $result;
	}
}
