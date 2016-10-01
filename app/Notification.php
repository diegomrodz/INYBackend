<?php

namespace INU;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function deviceOption() 
    {
    	return $this->hasOne('INU\Option', 'id', 'device_option_id');
    }

    public function patient() 
    {
    	return $this->hasOne('INU\Patient', 'id', 'patient_id');
    }

    public function caretaker() 
    {
		return $this->hasOne('INU\Caretaker', 'id', 'caretaker_id');
    }
    
    public function device() 
    {
		return $this->hasOne('INU\Device', 'id', 'device_id');
    }

    public function action() 
    {
		return $this->hasOne('INU\Action', 'id', 'action_id');
    }

}
