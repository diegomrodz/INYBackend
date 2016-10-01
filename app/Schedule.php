<?php

namespace INU;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function caretaker() 
    {
    	return $this->hasOne('INU\Caretaker', 'id', 'caretaker_id');
    }

    public function patient() 
    {
    	return $this->hasOne('INU\Patient', 'id', 'patient_id');
    }
}
