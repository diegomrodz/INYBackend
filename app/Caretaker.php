<?php

namespace INU;

use DB;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

use INU\Schedule;

class Caretaker extends Model
{
    public function user() 
    {
    	return $this->hasOne('INU\User', 'id', 'user_id');
    }

    public function homeCare() 
    {
    	return $this->hasOne('INU\HomeCare', 'id', 'home_care_id');
    }

    public function schedulePatients() 
    {
    	return Schedule::whereDate('schedules.date', Carbon::now()->toDateString())
    				   ->where('schedules.caretaker_id', $this->id)
    				   ->join('patients', function ($join) {
    				   		$join->on('schedules.patient_id', '=', 'patients.id');
    				   })
    				   ->join('users', function ($join) {
    				   		$join->on('patients.user_id', '=', 'users.id');
    				   })
                       ->join('patient_mental_healths as pmh', function ($join) {
                            $join->on('patients.mental_health_id', '=', 'pmh.id');
                       })
                       ->join('patient_oxygenations as po', function ($join) {
                            $join->on('patients.oxygenation_id', '=', 'po.id');
                       })
                       ->join('patient_vital_signs as pvs', function ($join) {
                            $join->on('patients.vital_sign_id', '=', 'pvs.id');
                       })
                       ->join('patient_motilities as pml', function ($join) {
                            $join->on('patients.motility_id', '=', 'pml.id');
                       })
                       ->join('patient_alimentations as pa', function ($join) {
                            $join->on('patients.alimentation_id', '=', 'pa.id');
                       })
                       ->join('patient_movimentations as pmv', function ($join) {
                            $join->on('patients.movimentation_id', '=', 'pmv.id');
                       })
                       ->join('patient_body_cares as pbc', function ($join) {
                            $join->on('patients.body_care_id', '=', 'pbc.id');
                       })
                       ->join('patient_evacuations as pe', function ($join) {
                            $join->on('patients.evacuation_id', '=', 'pe.id');
                       })
                       ->join('patient_therapies as pt', function ($join) {
                            $join->on('patients.therapy_id', '=', 'pt.id');
                       })
    				   ->select(
                            'patients.*', 
                            
                            'users.name', 
                            'users.email',
                            
                            'pmh.desc as mental_health',
                            'pmh.fugullin_scale as mental_health_scale',
                            
                            'po.desc as oxygenation',
                            'po.fugullin_scale as oxygenation_scale',

                            'pvs.desc as vital_sign',
                            'pvs.fugullin_scale as vital_sign_scale',

                            'pml.desc as motility',
                            'pml.fugullin_scale as motility_scale',

                            'pa.desc as alimentation',
                            'pa.fugullin_scale as alimentation_scale',

                            'pmv.desc as movimentation',
                            'pmv.fugullin_scale as movimentation_scale',

                            'pbc.desc as body_care',
                            'pbc.fugullin_scale as body_care_scale',

                            'pe.desc as evacuation',
                            'pe.fugullin_scale as evacuation_scale',

                            'pt.desc as therapy',
                            'pt.fugullin_scale as therapy_scale'
                        )
    				   ->get();
    }
}
