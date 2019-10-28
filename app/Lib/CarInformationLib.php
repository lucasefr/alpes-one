<?php

use Carbon\Carbon;

class CarInformationLib  implements ICarInformation
{
	const URL = 'https://seminovos.com.br';

	public $vehicle_type;
    public $isNew;
    public $isSemiNew;
    public $branch;
    public $model;
    public $initialPrice;
    public $finalPrice;
    public $inicialYear;
    public $finalYear;
    public $private;
	public $resale;
	
	public function getCarInformation($carInformation)
	{
		
	}

	public function makeUrl($carInformation)
	{
		
	}
	
	
}
