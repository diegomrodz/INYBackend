<?php

namespace INU;

use Illuminate\Database\Eloquent\Model;

class HomeCare extends Model
{
    public function user() 
    {
        return $this->hasOne('INU\User', 'id', 'user_id');
    }

    public function patients($active = true) 
    {
    	return Patient::where('home_care_id', $this->id)
    				  ->where('active', $active)
    				  ->get();
    }
}
