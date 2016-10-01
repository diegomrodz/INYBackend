<?php

namespace INU;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
	public function leftOption() 
	{
		return $this->hasOne('INU\Option', 'id', 'left_option_id');
	}

	public function rightOption() 
	{
		return $this->hasOne('INU\Option', 'id', 'right_option_id');
	}
}
