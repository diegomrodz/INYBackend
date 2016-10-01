<?php

namespace INU;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user() 
    {
    	return $this->hasOne('INU\User', 'id', 'user_id');
    }

    public function homeCare() 
    {
    	return $this->hasOne('INU\HomeCare', 'id', 'home_care_id');
    }

    public function device() 
    {
    	return $this->hasOne('INU\Device', 'id', 'current_patient_id');
    }
}
