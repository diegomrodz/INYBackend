<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use INU\User;
use INU\HomeCare;
use INU\Caretaker;
use INU\Patient;
use INU\Device;
use INU\Panel;
use INU\Schedule;
use INU\Option;

class DummyDataSeeder extends Seeder
{
	protected $admins = [
		[
			"name" 		=> "Diego Rodrigues",
			"email"		=> "diego.mrodrigues@outlook.com"
		]
	];

	protected $data = [
		"Dummy Home Care" => [
			"email" 		=> "homecare@dummy.com",
			"desc" 			=> "Home Care para testes da plataforma",
		
			"caretakers" 	=> [
				[
					"name"		=> "Alice",
					"email" 	=> "alice@dummy.com",
				],
				[
					"name"		=> "Bob",
					"email" 	=> "bob@dummy.com",
				]	
			],

			"patients"		=> [
				[
					"name"		=> "Judie",
					"email"		=> "judie@email.com",
					"age"		=> 60,

					"fugullin" 	=> [
						"mental_health_id" 	=> 1,
						"oxygenation_id" 	=> 3,
						"vital_sign_id"		=> 2,
						"motility_id"		=> 2,
						"movimentation_id"	=> 3,
						"alimentation_id"	=> 2,
						"body_care_id"		=> 2,
						"evacuation_id"		=> 2,
						"therapy_id"		=> 1
					] 
				],
				[
					"name"		=> "Maria",
					"email"		=> "maria@email.com",
					"age"		=> 70,

					"fugullin" 	=> [
						"mental_health_id" 	=> 3,
						"oxygenation_id" 	=> 2,
						"vital_sign_id"		=> 3,
						"motility_id"		=> 3,
						"movimentation_id"	=> 4,
						"alimentation_id"	=> 2,
						"body_care_id"		=> 4,
						"evacuation_id"		=> 4,
						"therapy_id"		=> 2
					] 
				],
				[
					"name"		=> "Greg",
					"email"		=> "greg@email.com",
					"age"		=> 65,

					"fugullin" 	=> [
						"mental_health_id" 	=> 2,
						"oxygenation_id" 	=> 2,
						"vital_sign_id"		=> 2,
						"motility_id"		=> 2,
						"movimentation_id"	=> 3,
						"alimentation_id"	=> 3,
						"body_care_id"		=> 3,
						"evacuation_id"		=> 3,
						"therapy_id"		=> 2
					] 
				]
			],


			"devices"		=> [
				[
					"name"		 => "Protótipo A",
					"code"		 => "pta",
					"desc"		 => "Dispositivo para testes",
					"email"		 => "proto.a@email.com",

					"patient"	 => 1,

					"main_panel" => [
						"down_option" => [
							"text" => "Dores"
						],

						"panels" => [
							[
								"left"   => "Fome",
								"right"  => "Banheiro"
							],
							[
								"left"   => "Televisão",
								"right"  => "Dormir"
							],
							[
								"left"   => "Ligação",
								"right"  => "Banho de Sol"
							]
						]
					]
				],
				[
					"name"		=> "Protótipo B",
					"code"		=> "ptb",
					"desc"		=> "Dispositivo para testes",
					"email"		=> "proto.b@email.com",

					"patient" 	=> 2,


					"main_panel" => [
						"down_option" => [
							"text" => "Sem Ar"
						],

						"panels" => []
					]
				],
				[
					"name"		=> "Protótipo C",
					"code"		=> "ptc",
					"desc"		=> "Dispositivo para testes",
					"email"		=> "proto.c@email.com",

					"patient"	=> 3,

					"main_panel" => [
						"down_option" => [
							"text" => "Mudar de Lado"
						],

						"panels" => [
							[
								"left"   => "Banheiro",
								"right"  => "Fome"
							]
						]
					]
				]
			],

			"schedules" => [
				1 => [
					[
						"days_from_today" => 1, // Segunda
						"patients" => [
							1,
							2
						]
					],
					[
						"days_from_today" => 2,
						"patients" => [
							1,
							2
						]
					],
					[
						"days_from_today" => 3,
						"patients" => [
							1,
							2,
							3
						]
					],
					[
						"days_from_today" => 5,
						"patients" => [
							3
						]
					],
					[
						"days_from_today" => 7,
						"patients" => [
							1,
							2,
							3
						]
					],
					[
						"days_from_today" => 8,
						"patients" => [
							3
						]
					],

				],

				2 => [
					[
						"days_from_today" => 1,
						"patients" => [
							3
						]
					],
					[
						"days_from_today" => 2,
						"patients" => [
							3
						]
					],
					[
						"days_from_today" => 4,
						"patients" => [
							1,
							2,
							3
						]
					],
					[
						"days_from_today" => 5,
						"patients" => [
							1,
							2
						]
					],
					[
						"days_from_today" => 6,
						"patients" => [
							1,
							2,
							3
						]
					],
					[
						"days_from_today" => 8,
						"patients" => [
							1,
							2
						]
					],
				]
			]
		]
	];


	protected function user($name, $email, $type) 
	{
		return User::create([
			"name" 		=> $name,
			"email" 	=> $email,
			"password" 	=> bcrypt("senha"),
			"type" 		=> $type
		]);
	}

	protected function homeCare(User $user, $name, $desc) 
	{
		return HomeCare::create([
			"user_id" 	=> $user->id,
			"name" 		=> $name,
			"desc"		=> $desc
		]);
	}

	protected function caretaker(User $user, HomeCare $homeCare) 
	{
		return Caretaker::create([
			"user_id" 		=> $user->id,
			"home_care_id"	=> $homeCare->id
		]);
	}

	protected function patient(User $user, HomeCare $homeCare) 
	{
		return Patient::create([
			"user_id" 		=> $user->id,
			"home_care_id"	=> $homeCare->id
		]);
	}

	protected function device(User $user, HomeCare $homeCare, $code, $desc) 
	{
		return Device::create([
			"user_id" 		=> $user->id,
			"home_care_id"	=> $homeCare->id,
			"code"			=> $code,
			"desc"			=> $desc
		]);
	}

	protected function panel(Device $device, $patientId, $downOption, Panel $parent = null) 
	{
		return Panel::create([
			"device_id" 	=> $device->id,
			"patient_id"	=> $patientId,
			"parent_id"		=> is_null($parent) ? null : $parent->id,
			"down_option"	=> is_null($downOption) ? null : $downOption["text"],
		]);
	}

	protected function option(Panel $panel, $text) 
	{
		return Option::create([
			"panel_id"	=> $panel->id,
			"text"		=> $text
		]);
	}

	protected function schedule(Caretaker $caretaker, Patient $patient, $date) 
	{
		return Schedule::create([
			"caretaker_id" => $caretaker->id,
			"patient_id" => $patient->id,
			"date" => $date
		]);
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach ($this->admins as $admin) 
    	{
    		$this->user($admin["name"], $admin["email"], "admin");
    	}

    	foreach ($this->data as $name => $data) 
    	{
    		$homeCare = $this->homeCare(
    			$this->user($name, $data["email"], "home_care"), 
    			$name, 
    			$data["desc"]
    		);


    		foreach ($data["patients"] as $_patient) 
    		{
    			$patient = $this->patient(
    				$this->user($_patient["name"], $_patient["email"], "patient"),
    				$homeCare
    			);

    			foreach ($_patient["fugullin"] as $key => $value) 
    			{
    				$patient[$key] = $value;
    			}

    			$patient->save();
    		}

    		foreach ($data["caretakers"] as $caretaker) 
    		{
    			$this->caretaker(
    				$this->user($caretaker["name"], $caretaker["email"], "caretaker"),
    				$homeCare
    			);
    		}

    		foreach ($data["devices"] as $device) 
    		{
    			$d = $this->device(
    				$this->user($device["name"], $device["email"], "device"),
    				$homeCare,
    				$device["code"],
    				$device["desc"]
    			);

    			$d->current_patient_id = $device["patient"];

    			$d->save();

    			$mp = $this->panel(
    				$d,
    				$device["patient"],
    				$device["main_panel"]["down_option"]
    			);

    			$lp = null;

    			foreach ($device["main_panel"]["panels"] as $panel) 
    			{
    				$p = $this->panel(
    					$d,
    					$device["patient"],
    					null,
    					$lp == null ? $mp : $lp
    				);

    				$lp = $p;

    				$lo = $this->option(
    					$p,
    					$panel["left"]
    				);

					$ro = $this->option(
    					$p,
    					$panel["right"]
    				);

					$p->left_option_id = $lo->id;
					$p->right_option_id = $ro->id;

					$p->save();
    			}
    		}

    		foreach ($data["schedules"] as $_caretaker => $_schedules) 
    		{
    			$caretaker = Caretaker::find($_caretaker);
    			$now = Carbon::now();

    			for ($week = 0; $week < 4; $week += 1) 
    			{
    				foreach ($_schedules as $_schedule) 
    				{
    					$firstDayOfTheMonth = Carbon::createFromDate($now->year, $now->month, 1);
    					$date = $firstDayOfTheMonth->addDays($_schedule["days_from_today"] + ($week * 7));

    					foreach ($_schedule["patients"] as $_patient) 
    					{
    						$patient = Patient::find($_patient);

    						$schedule = $this->schedule(
    							$caretaker,
    							$patient,
    							$date
    						);
    					}
    				}
    			}
    		}


    	}
    }
}
