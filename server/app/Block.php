<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Block extends Model
{
    protected $table = 'blocks';
    
    public function topics()
    {
		return DB::table('topics')->
			where('block', '=', $this->id)->
			get();
	}
}
