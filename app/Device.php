<?php

namespace INU;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function user() 
    {
    	return $this->hasOne('INU\User', 'id', 'user_id');
    }

    public function homeCare() 
    {
    	return $this->hasOne('INU\HomeCare', 'id', 'home_care_id');
    }

    public function patient() 
    {
        return $this->hasOne('INU\Patient', 'id', 'current_patient_id');
    }

    public function panelsFor(Patient $patient) 
    {
    	return Panel::where('device_id', $this->id)
	    			->where('patient_id', $patient->id)
	    			->where('active', true)
	    			->get();
    }


    public function panelNameFor(Patient $patient) 
    {
    	return 'device_panel_of_' . $this->id . '_for_' . $patient->id; 
    }

    public function getNextPanelFor(Patient $patient, $status, $level) 
    {
    	$panels = $this->panelsFor($patient);
    	$hasMoreOptions = count($panels) >= $level + 1;
    	$nextPanel = null;

		foreach ($panels as $_panel) 
    	{
    		if ($_panel->parent_id == $status["currentPanel"]["id"]) 
    		{
    			$nextPanel = $_panel;
    			break;
    		}
    	}

        if ($nextPanel == null) {
            return null;
        }

		return [
    		"level" => $level + 1,

    		"leftOption" => $nextPanel->leftOption,

    		"rightOption" => $nextPanel->rightOption,

    		"bottomOption" => [
    			"id" 		=> null,
    			"panel_id" 	=> null,
    			"text" 		=> "Voltar",
    			"bgColor"	=> ""
    		],

    		"topOption" => $hasMoreOptions ? "Mais Opções" : "",

    		"currentPanel" => $nextPanel,
    		"selectedOption" => ""
    	];    	
    }

    public function startPanelFor(Patient $patient) 
    {
    	$panels = $this->panelsFor($patient);
    	$hasMoreOptions = count($panels) >= 2;
    	$starterPanel;

    	foreach ($panels as $_panel) 
    	{
    		if ($_panel->parent_id == null) 
    		{
    			$starterPanel = $_panel;
    			break;
    		}
    	}

    	return [
    		"level" => 0,

    		"leftOption" => [
    			"id" 		=> null,
    			"panel_id" 	=> $starterPanel->id,
    			"text" 		=> "Não",
    			"bgColor"	=> "danger"
    		],

    		"rightOption" => [
    			"id" 		=> null,
    			"panel_id" 	=> $starterPanel->id,
    			"text" 		=> "Sim",
    			"bgColor"	=> "positive"
    		],

    		"bottomOption" => [
    			"id" 		=> null,
    			"panel_id" 	=> $starterPanel->id,
    			"text" 		=> $starterPanel->down_option,
    			"bgColor"	=> "warning"
    		],

    		"topOption" => $hasMoreOptions ? "Mais Opções" : "",

    		"currentPanel" => $starterPanel,
    		"selectedOption" => ""
    	];
    }
}
