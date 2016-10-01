<?php

use Illuminate\Database\Seeder;

use INU\PatientAlimentation;
use INU\PatientBodyCare;
use INU\PatientEvacuation;
use INU\PatientMentalHealth;
use INU\PatientMotility;
use INU\PatientMovimentation;
use INU\PatientOxygenation;
use INU\PatientTherapy;
use INU\PatientVitalSign;

class FugullinScalesSeeder extends Seeder
{

	protected $mentals = [
			[
				"fugullin_scale" => 1,
				"desc" => "Orientação no tempo e no espaço"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Período de desorientação no tempo e no espaço"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Período de inconsciência"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Inconsciente"
			]
	];

	protected $oxygenations = [
		[
				"fugullin_scale" => 1,
				"desc" => "Não depende de oxigênio"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Uso intermitente de máscara ou cateter"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Uso contínuo de máscara ou catéter de oxigênio"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Ventilação Mecânica"
			]
	];

	protected $vitals = [
		[
				"fugullin_scale" => 1,
				"desc" => "Controle de Rotina"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Controle em intervalos de 6 horas"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Controle em intervalos de 4 horas"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Controle em intervalos menores ou iguais a 2 horas"
			]
	];

	protected $motilities = [
		[
				"fugullin_scale" => 1,
				"desc" => "Movimenta todos os segmentos corporais"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Limitação de movimentos"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Dificuldade para movimentar segmentos corporais, mudanças de decúbito e movimentação passiva auxiliada"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Incapaz de movimentar qualquer segmento corporal, mudança de decúbito e movimentação passiva auxiliada"
			]
	];


	protected $movimentations = [
			[
				"fugullin_scale" => 1,
				"desc" => "Ambulante"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Necessita de auxílio para deambular"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Locomoção através de cadeira de rodas"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Restrita ao leito"
			]
	];

	protected $alimentations = [
			[
				"fugullin_scale" => 1,
				"desc" => "Auto-suficiente"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Por boca com auxilio"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Através de sonda nasogástrica ou SNE"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Ataravés de cateter central (NPP)"
			]
	];

	protected $bodies = [
			[
				"fugullin_scale" => 1,
				"desc" => "Auto-suficiente"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Auxilio no banho de chuveiro e/ou na higiene oral"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Banho no chuveiro, higiene oral, realizada pelo(a) cuidador(a)"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Banho no leito, higiene oral realizada pelo(a) cuidador(a)"
			]
	];

	protected $evacuations = [
			[
				"fugullin_scale" => 1,
				"desc" => "Auto-suficiente"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "Uso de vaso sanitário com auxílio"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "Uso de comadre ou eliminação no leito. Uso de fralda."
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Evacuação no leito e uso de sonda vesical para controle de diurese"
			]
	];

	protected $therapies = [
			[
				"fugullin_scale" => 1,
				"desc" => "IM ou VO"
			],
			[
				"fugullin_scale" => 2,
				"desc" => "EV intermitente"
			],
			[
				"fugullin_scale" => 3,
				"desc" => "EV contínua ou através de sonda nasogástrica"
			],
			[
				"fugullin_scale" => 4,
				"desc" => "Uso de drogas vasoativas quimicoterápicos e derivados de sanguíneos"
			]
	];



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach ($this->mentals as $mental) 
		{
			PatientMentalHealth::create($mental);
		}

		foreach ($this->alimentations as $alimentation) 
		{
			PatientAlimentation::create($alimentation);
		}

		foreach ($this->oxygenations as $oxygenation) 
		{
			PatientOxygenation::create($oxygenation);
		}

		foreach ($this->vitals as $vital) 
		{
			PatientVitalSign::create($vital);
		}

		foreach ($this->motilities as $motility) 
		{
			PatientMotility::create($motility);
		}

		foreach ($this->movimentations as $movimentation) 
		{
			PatientMovimentation::create($movimentation);
		}

		foreach ($this->bodies as $body) 
		{
			PatientBodyCare::create($body);
		}

		foreach ($this->evacuations as $evacuation) 
		{
			PatientEvacuation::create($evacuation);
		}

		foreach ($this->therapies as $therapy) 
		{
			PatientTherapy::create($therapy);
		}

    }
}
