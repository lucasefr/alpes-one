<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Goutte;

class CrawlerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    private $vehicle_type;
    private $isNew;
    private $isSemiNew;
    private $branch;
    private $model;
    private $city;
    private $initialPrice;
    private $finalPrice;
    private $inicialYear;
    private $finalYear;
    private $private;
    private $resale;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCrawler(){

        $this->vehicleType = '';
        $this->isNew = '';
        $this->isSemiNew = '';
        $this->branch = '';
        $this->model = '';
        $this->city = '';
        $this->initialPrice = '';
        $this->finalPrice = '';
        $this->inicialYear = '';
        $this->finalYear = '';
        $this->private = '';
        $this->resale = '';

        $crawler = Goutte::request('GET', 'https://seminovos.com.br');
        $filter = $crawler->filter('.section-features');

        dd($filter);

        $params = array(
			'vehicle_type' 			=> $this->vehicleType,
            'is_new' 				=> $this->isNew,
            'is_seminew' 			=> $this->isSemiNew,
            'branch' 				=> $this->branch,
            'model' 				=> $this->model,
            'city' 				    => $this->city,
            'initial_price' 		=> $this->initialPrice,
            'final_price' 			=> $this->finalPrice,
            'inicial_year' 			=> $this->inicialYear,
            'final_year' 			=> $this->finalYear,
            'private' 				=> $this->private,
            'resale' 				=> $this->resale,
        );

        $response = $this->call('GET', '/api/get_user_status', $params);
		$apiResult  = json_decode($response->getContent());

		$this->assertEquals($apiResult->success, true);

    }
}
