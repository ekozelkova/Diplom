<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'blocks';
    
    public function topics()
    {
		return Topic::where('block', '=', $this->id)->
			get();
	}
}
